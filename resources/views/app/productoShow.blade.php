@extends('layouts.adminLTE')

@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vista individual del producto</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <!-- Contenido -->
        <div class="card-body">
        <p>
          <a href="{{ route('producto.index') }}">Listado de productos</a>
        </p>
        
        <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Provedor</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td> 
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>
                <td><img height="100px" width="auto" src="{{ $producto->img }}" alt="productImg"></td>
                <td>{{ $producto->provedor->nombre }}</td>
              </tr>
            </tbody>
          </table>
          
          <br>
          <!-- Se necesita un form para redireccionar a "producto deestroy" y eliminar el producto -->
          <form action="{{ route('producto.destroy', $producto) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar producto">
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection