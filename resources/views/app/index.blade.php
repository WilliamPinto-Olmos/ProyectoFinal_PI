@extends('layouts.adminLTE')

@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    
    <div class="landing-container">
        <div class="landing-header">
          <h1 class="mt-4" style="font-size: 5rem; ">Bienvenidos a</h1>
          <div class="circle d-flex justify-content-center align-items-center">
            <img src="{{ asset('app/dist/img/Brandlogo.png') }}" alt="" class="img-fluid">
          </div>
        </div>
    </div>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inicio</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        
        <!-- CONTENIDO -->
        <div class="card-body row">
          @foreach ($productos as $producto)
            <div class="products-container col-md-4">
              <div class="product-card">
                <form action="{{ route('producto.addToUser', $producto) }}" method="POST">
                  @csrf
                  <a href="{{ route('producto.showSingle', $producto->id) }}">
                    <img src="{{ $producto->img }}" alt="product image" class="product-img-card">
                    <h1>{{ $producto->nombre }}</h1>
                  </a>
                  <p class="price">${{ $producto->precio }}.00</p>
                  <p class="product-description">{{ $producto->descripcion }}</p>
                  <input type="hidden" name="producto_id" id="producto_id" value="{{ $producto->id }}">
                  <p class="add-to-cart"><button type="submit">Añadir al carrito</button></p>
                </form>
              </div>           
            </div>
          @endforeach
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection