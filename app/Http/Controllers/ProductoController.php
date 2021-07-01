<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductoController extends Controller
{
    private $rules;

    public function __construct()
    {
        parent::__construct();
        
        $this->rules = [
            'nombre' => ['required', 'string', 'min:3', 'max:255'],
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:0',
            'img' => 'required|URL',
            'provedor_id' => 'required|integer|min:0'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('administrar-productos');

        $productos = Producto::all();
        return view('app.productoIndex', compact('productos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('administrar-productos');

        $provedores = app('App\Http\Controllers\ProvedorController')->getProvedores();

        return view('app.productoForm', compact('provedores') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $producto = new Producto();
        $producto->nombre = $request->nombre ;
        $producto->descripcion = $request->descripcion ;
        $producto->precio = $request->precio ;
        $producto->stock = $request->stock ;
        $producto->img = $request->img ;

        $producto->save(); */

        Gate::authorize('administrar-productos');

        $request->validate($this->rules);
        Producto::create($request->all());

        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        Gate::authorize('administrar-productos');

        return view('app.productoShow', compact('producto') );
    }

    public function showSingle(Producto $producto)
    {
        return view('app.productoShowSingle', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        Gate::authorize('administrar-productos');

        $provedores = app('App\Http\Controllers\ProvedorController')->getProvedores();

        return view('app.productoForm', compact('producto', 'provedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        Gate::authorize('administrar-productos');

        $request->validate($this->rules);

        Producto::where('id', $producto->id)->update($request->except('_token', '_method'));

        return redirect()->route('producto.show', $producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        Gate::authorize('administrar-productos');

        $producto->delete();

        return redirect()->route('producto.index');
    }

    public function addToUser(Request $request, Producto $producto)
    {
        $user = Auth::user();
        
        $productoRepetido = $user->productos()->find($request->producto_id); //Si retorna un producto existente quiere decir que el producto a agregar ya se encontraba en el carrito anteriormente
        
        if($productoRepetido) 
        {
            $newAttributes = [
                'cantidadProducto' => $user->productos()->find($request->producto_id)->pivot->cantidadProducto + 1
            ];
            $user->productos()->updateExistingPivot($request->producto_id, $newAttributes);
        }
        else
        {
            $user->productos()->attach($request->producto_id);
        }
        
        return redirect()->route('index');
    }

    public function deleteFromUser(Request $request, Producto $producto)
    {
        $user = Auth::user();
        $user->productos()->detach($producto->id);

        return redirect()->route('shopcart', $user);
    }
}
