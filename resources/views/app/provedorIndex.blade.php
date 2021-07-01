@extends('layouts.adminLTE')

@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Provedores de 1 / 4 de Milla</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            
            @foreach($provedores as $provedor)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                    ID Provedor: # {{ $provedor->id }}
                    </div>
                    <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                        <h2 class="lead"><b>{{ $provedor->nombre }}</b></h2>
                        <p class="text-muted text-sm"><b>Descripción: </b> {{ $provedor->descripcion }} </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Dirección: {{ $provedor->direccion }}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Teléfono: {{ $provedor->telefono }}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Correo: {{ $provedor->correo }}</li>
                        </ul>
                        </div>
                        <div class="col-5 text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/Google_Contacts_logo.png" alt="user-avatar" class="img-circle img-fluid">
                        <!-- <img src="https://cdn.icon-icons.com/icons2/510/PNG/512/android-contacts_icon-icons.com_50530.png" alt="user-avatar" class="img-circle img-fluid"> -->
                        </div>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="text-right">
                        <a href="{{ route('provedor.show', $provedor) }}" class="btn btn-sm  bg-teal">
                        <i class="fas fa-user"></i> Ver perfil
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
            
        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection