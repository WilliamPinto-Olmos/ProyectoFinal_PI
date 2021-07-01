@extends('layouts.adminLTE')

@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Carrito de compras</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <!-- CONTENIDO -->
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Imagen</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productos as $producto)
                <tr>
                  <td>{{ $producto->nombre }}</td> 
                  <td>{{ $producto->descripcion }}</td>
                  <td>{{ $producto->precio }}</td>
                  <td>{{ $producto->pivot->cantidadProducto }}</td>
                  <td><img height="100px" width="auto" src="{{ $producto->img }}" alt="productImg"></td>
                  <td>
                    <form action="{{ route('producto.deleteFromUser', $producto) }}" method="POST">
                      @csrf
                      <input type="submit" value="Eliminar producto">
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection