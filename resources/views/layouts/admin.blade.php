<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrador </title>

  <!-- CKEditor -->
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css" />

  <!-- Full Calendar -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
  
  <script src="{{url('fullcalendar/es.global.js')}}"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ url ('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url ('plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url ('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- jQuery -->
  <script src="{{ url ('plugins/jquery/jquery.min.js') }}"></script>

  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('/admin')}}" class="nav-link">Menú principal</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Vital Salud y Belleza</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            @can('admin.usuario.index')
            <li class="nav-item">
              <a href="{{url('admin/configuracion')}}" class="nav-link active">
                <i class="nav-icon fas bi bi-gear-fill"></i>
                <p>
                  Configuraciones
                </p>
              </a>
            </li>
            @endcan

            @can('admin.usuario.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-people-fill"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/usuario')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/usuario/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creacion de usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('admin.secretaria.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-tv"></i>
                <p>
                  Secretarias
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/secretaria')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de secretarias</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/secretaria/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creacion de secretarias</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @can('admin.paciente.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon bi bi-person-arms-up"></i>
                <p>
                  Pacientes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/paciente')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Pacientes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/paciente/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creacion de Pacientes</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @can('admin.consultorio.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-building-add"></i>
                <p>
                  Consultorios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('/admin/consultorio')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de consultorios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/consultorio/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creacion de consultorios</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @can('admin.doctor.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-person-add"></i>
                <p>
                  Doctores
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/doctor')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de doctores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/doctor/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creacion de doctores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/doctor/reporte')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reportes</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan

            @can('admin.horario.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-calendar-range"></i>
                <p>
                  Horarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/horario')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de horarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/horario/create')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Creacion de Horarios</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('admin.usuario.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-calendar-fill"></i>
                <p>
                  Reservas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/reserva/reporte')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Reportes</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('admin.historial.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-clock-history"></i>
                <p>
                  Historial de Citas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/historial')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de historial</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('admin/historial/buscarPaciente')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Buscar Historial de un Paciente</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('admin.pago.index')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas bi bi-cash-coin"></i>
                <p>
                  Pagos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('admin/pago')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de pagos</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link" style="background-color: crimson;" id="" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="nav-icon fas bi bi-arrow-up-left-circle-fill"></i>
                <p>
                  Cerrar sesión
                </p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    @if(($icon = Session::get('icono')) && ($message = Session::get('mensaje')))
    <script>
      Swal.fire({
        title: "{{$message}}",
        icon: "{{$icon}}",
        text: "Ahora podra ver las credenciales en la tabla."
      });
    </script>
    @endif
    <div class="content-wrapper">
      <br>
      <div class="container">
        @yield('content')
      </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- Bootstrap 4 -->
  <script src="{{ url ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Datatables  -->
  <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


  <!-- AdminLTE App -->
  <script src="{{ url ('dist/js/adminlte.min.js') }} "></script>
</body>

</html>