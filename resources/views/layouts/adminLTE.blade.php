<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vinos y Licores</title>

  <link rel="icon" href="{{ asset('app/dist/img/BrandLogo.png') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{  asset ('app/plugins/fontawesome-free/css/all.min.css')  }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{  asset ('app/dist/css/adminlte.min.css')  }}">
  <!-- CSS Product Cards Desing -->
  <link rel="stylesheet" href="{{  asset ('app/dist/css/productCard.css')  }}">
  <link rel="stylesheet" href="{{  asset ('app/dist/css/landing.css')  }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->

      @guest 
        <li class="nav-item">
          <a href="/login">
            <button type="button" class="btn btn-info btn-block">
              <i class="fas fa-sign-in-alt"></i>
              Iniciar sesión
            </button>
          </a>
        </li>
      @endguest

      @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('shopcart', $user) }}">
            <i class="fas fa-shopping-cart"></i>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            @if( $user->is_admin )
              <i class="fas fa-user-shield"></i>

            @elseif ( !$user->is_admin )
              <i class="fas fa-user"></i>
            @endif
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Perfil
            </a>
              @if( $user->is_admin )
                <div class="dropdown-divider"></div>
                <a href="{{ route ('producto.index') }}" class="dropdown-item">
                <i class="fas fa-cogs"></i> Administrar
                </a>
              @endif
            <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="#" class="dropdown-item" onclick="event.preventDefault();
                                  this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Salir
                  </a>
              </form>

          </div>
        </li>
      @endauth

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
    @include('partials.navegacion')
  
  <!-- Content Wrapper. Contains page content -->
    @yield('contenido')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('app/plugins/jquery/jquery.min.js')  }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('app/plugins/bootstrap/js/bootstrap.bundle.min.js')  }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('app/dist/js/adminlte.min.js')  }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('app/dist/js/demo.js')  }}"></script>
</body>
</html>
