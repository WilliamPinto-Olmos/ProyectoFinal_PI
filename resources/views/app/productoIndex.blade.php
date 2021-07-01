@extends('layouts.adminLTE')

@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de productos</h1>
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
          <p>
            <a href="{{ route('producto.create') }}">Agregar nuevo producto</a>
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
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productos as $producto)
                <tr>
                  <td>{{ $producto->id }}</td>
                  <td> 
                    <a href="{{ route('producto.show', $producto->id) }}">{{ $producto->nombre }}</a>
                  </td> 
                  <td>{{ $producto->descripcion }}</td>
                  <td>{{ $producto->precio }}</td>
                  <td>{{ $producto->stock }}</td>
                  <td><img height="100px" width="auto" src="{{ $producto->img }}" alt="productImg"></td>
                  <td>{{ $producto->provedor->nombre }}</td>
                  <td>
                    <a href="{{ route('producto.edit', $producto) }}">Editar producto</a>
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