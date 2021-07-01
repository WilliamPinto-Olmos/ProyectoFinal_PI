@extends('layouts.adminLTE')

@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de archivos</h1>
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
            <a href="{{ route('archivo.create') }}">Agregar nuevo archivo</a>
          </p>

          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre Original</th>
                <th>Ruta</th>
                <th>Mime</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($archivos as $archivo)
                <tr>
                  <td>{{ $archivo->id }}</td>
                  <td>{{ $archivo->nombre_original }}</td> 
                  <td>{{ $archivo->ruta }}</td>
                  <td>{{ $archivo->mime }}</td>
                  <td>
                    <a href="{{ route('archivo.download', $archivo) }}" class="btn btn-info" style="color:white">Descargar</a>
                    <form action="{{ route('archivo.destroy', $archivo) }}" method="POST" style="margin-top:10px">
                      @csrf
                      @method('DELETE')
                      <input type="submit" class="btn btn-danger" value="Eliminar producto">
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