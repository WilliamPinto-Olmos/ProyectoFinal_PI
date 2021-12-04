<style>
    body {
        background: #f5f5f5
    }

    .rounded {
        border-radius: 1rem
    }

    .nav-pills .nav-link {
        color: #555
    }

    .nav-pills .nav-link.active {
        color: white
    }

    input[type="radio"] {
        margin-right: 5px
    }

    .bold {
        font-weight: bold
    }
</style>

<div class="container ">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Tarjeta de crédito </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Entidad bancaria </a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form role="form" onsubmit="event.preventDefault()">
                                <div class="form-group"> <label for="username">
                                        <h6>Titular de la tarjeta</h6>
                                    </label> <input type="text" name="username" placeholder="Nombre del titular" required class="form-control "> </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Número de tarjeta</h6>
                                    </label>
                                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Número de tarjeta válido" class="form-control " required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Fecha de expiración</h6>
                                                </span></label>
                                            <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Los tres dígitos CV que aparecen al reverso de su tarjeta">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text" required class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="card-footer"> <button type="button" class="paymentButton subscribe btn btn-primary btn-block shadow-sm"> Confirmar pago </button>
                            </form>
                        </div>
                    </div> <!-- End -->
                    <!-- Paypal info -->
                    <div id="paypal" class="tab-pane fade pt-3">
                        <h6 class="pb-2">Seleccione su tipo de cuenta Paypal</h6>
                        <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Doméstica </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">Internacional </label></div>
                        <p> <button type="button" class="paymentButton btn btn-primary "><i class="fab fa-paypal mr-2"></i> Acceder a mi Paypal</button> </p>
                        <p class="text-muted"> Nota: Después de clickear el botón será redirigido al sistema de Paypal. Después de completar su pago, será redirigido a esta página a mostar los detalles finales de la orden. </p>
                    </div> <!-- End -->
                    <!-- bank transfer info -->
                    <div id="net-banking" class="tab-pane fade pt-3">
                        <div class="form-group "> <label for="Select Your Bank">
                                <h6>Seleccione su banco</h6>
                            </label> <select class="form-control" id="ccmonth">
                                <option value="" selected disabled>--Please select your Bank--</option>
                                <option>Banco 1</option>
                                <option>Banco 2</option>
                                <option>Banco 3</option>
                                <option>Banco 4</option>
                                <option>Banco 5</option>
                                <option>Banco 6</option>
                                <option>Banco 7</option>
                                <option>Banco 8</option>
                                <option>Banco 9</option>
                                <option>Banco 10</option>
                            </select> </div>
                        <div class="form-group">
                            <p> <button type="button" class="paymentButton btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceder al pago</button> </p>
                        </div>
                        <p class="text-muted"> Nota: Después de clickear el botón será redirigido al sistema de Paypal. Después de completar su pago, será redirigido a esta página a mostar los detalles finales de la orden. </p>
                    </div> <!-- End -->
                    <!-- End -->
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('app/plugins/jquery/jquery.min.js')  }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('app/plugins/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('app/dist/js/adminlte.min.js')  }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('app/dist/js/demo.js')  }}"></script>
{{-- SweetAlert2 --}}
<script src={{ asset("app/plugins/sweetalert2/sweetalert2.min.js")}}></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.paymentButton').click( function () {
        Swal.fire({
            title: 'Exito!',
            text: 'Pago realizado con éxito',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then(function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/eliminarProductos/",
                type: "DELETE",
                data: {
                    
                },
                dataType: "JSON",
            });
            window.location.href = "/";
        });
    });
</script>