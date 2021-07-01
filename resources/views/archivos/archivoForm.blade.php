@extends('layouts.adminLTE')

@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Formulario de archivos</h1>
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

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Subir nuevo archivo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                @if(isset($archivo))
                  <!-- Editar archivo -->
                  <form action="{{ route('archivo.update', $archivo) }}" method="POST" enctype="multipart/form-data">    
                    @method('PATCH')
                @else 
                <!-- Crear archivo -->
                  <form action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
                @endif
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFile">Archivo</label>
                            <div class="input-group">
                                <input type="file" name="archivo" id="archivo" >
                            </div>
                            <div class="input-group-append" style="margin-top:20px;">
                                    <button type="submit" class="btn btn-primary" value="Guardar">Agregar archivo</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

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