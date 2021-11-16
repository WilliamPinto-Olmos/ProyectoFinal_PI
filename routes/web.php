<?php

use App\Models\Archivo;
use App\Models\Producto;
use App\Models\Provedor;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProvedorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', function () {
    $user = Auth::user();
    $signed_in = Auth::check();
       
    $productos = Producto::all();
    return view('app.index', compact('productos', 'user', 'signed_in'));
    
})->name('index');

Route::get('/welcome', function () {

    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('archivo/download/{archivo}', [ArchivoController::class, 'download'])->name('archivo.download')->middleware('auth');
Route::get('producto/showSingle/{producto}', [ProductoController::class, 'showSingle'])->name('producto.showSingle')->middleware('auth');
Route::post('producto/{producto}/addToUser', [ProductoController::class, 'addToUser'])->name('producto.addToUser')->middleware('auth');
Route::post('producto/{producto}/deleteFromUser', [ProductoController::class, 'deleteFromUser'])->name('producto.deleteFromUser')->middleware('auth');

Route::resource('archivo', ArchivoController::class)->except(['edit', 'update', 'show'])->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('provedor', ProvedorController::class)->middleware('auth');

Route::get('{user}/shopcart', function () {
    $user = Auth::user();
    $productos = $user->productos()->with('users')->get(); //eager loader
    $bill_checkout = 0;

    foreach ($productos as $producto) {
         $bill_checkout += $producto->precio * $producto->pivot->cantidadProducto;
    }

    return view('app.shopcart', compact('user', 'productos', 'bill_checkout'));
    
})->name('shopcart')->middleware('verified');