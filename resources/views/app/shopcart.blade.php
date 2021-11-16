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
            <table class="table align-middle table-bordered table-hover">
              <thead class="thead-dark">
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
                        <input type="submit" class="btn btn-danger" value="Eliminar producto">
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          
            <div id="total-checkout" class="mt-5 d-flex justify-content-end align-items-center" style="text-align: center">
              <h3 class="d-flex align-items-center" >Total de compra: </h3>
              <h5 style="font-size: 30px" class="text-muted ">${{ $bill_checkout }}</h5>  
            </div>
            <div id="checkout-btn" class="d-flex justify-content-end">
              <button id="proced-to-checkout" class="btn btn-dark">
                Proceder al pago
              </button>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection