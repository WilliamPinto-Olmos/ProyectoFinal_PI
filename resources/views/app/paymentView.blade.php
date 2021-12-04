@extends('layouts.adminLTE')

@section('contenido')

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      
        <!-- CONTENIDO -->
        <div class="card-body">
            
          @include('partials.paymentForm')
            
        </div>  
        <!-- /.card-body -->
      <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection