@extends('layouts.adminLTE')

@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Formulario de productos</h1>
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

          @include('partials.formErrors')

            <div class="card card-primary" >
              <div class="card-header">
                <h3 class="card-title">Agregar nuevo producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                @if(isset($producto))
                  <!-- Editar programa -->
                  <form action="{{ route('producto.update', $producto) }}" method="POST">    
                    @method('PATCH')
                @else 
                <!-- Crear programa -->
                  <form action="{{ route('producto.store') }}" method="POST">
                @endif
                @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $producto->nombre ?? '' }}">
                      </div>
                      <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') ?? $producto->descripcion ?? '' }}">  
                      </div>
                      <div class="form-group">
                        <label for="precio">Precio: </label>
                        <input class="form-control" type="number" min="0" name="precio" id="precio" value="{{ old('precio') ?? $producto->precio ?? '' }}"> 
                      </div>
                      <div class="form-group">
                        <label for="stock">Stock: </label>
                        <input class="form-control" type="number" min="0" name="stock" id="stock" value="{{ old('stock') ?? $producto->stock ?? '' }}">
                      </div>
                      <div class="form-group">
                        <label for="img">Imagen: </label>
                        <input class="form-control" type="text" name="img" id="img" value="{{ old('img') ?? $producto->img ?? '' }}">
                      </div>
                    </div>
                    <div class="form-group" style="padding:20px;">
                      <label for="provedor_id">Provedor: </label>
                      <select class="form-control select2" name="provedor_id" style="width: 100%;">
                        @foreach($provedores as $provedor)
                          <option value="{{ $provedor->id }}">{{ $provedor->nombre }}</option>
                        @endforeach
                      </select>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" value="Guardar">Agregar producto</button>
                    </div>
                  </form>
            </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection