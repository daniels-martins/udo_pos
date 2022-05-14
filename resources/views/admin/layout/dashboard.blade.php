<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Copatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>
    @auth('web')Admin @endauth
    @auth('emp')Employee @endauth
    Panel | {{ ucfirst(Route::currentRouteName()) }}
  </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  {{-- <link rel="stylesheet" href="/adminlte/plugins/jqvmap/jqvmap.min.css">  --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">

  {{-- my added styles --}}
  <link rel="stylesheet" href="/adminlte/dist/css/main.css">
  @yield('header_style')


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<div class=d-none id="data-box" all_products='{{ $all_products }}' csrf={{ csrf_token() }}>
  marry me
</div>

<body class="hold-transition sidebar-mini @if(Route::currentRouteName() == 'pos'){{ " sidebar-collapse"}}@endif">
  @if(Session::has('success')||Session::has('warning')||Session::has('error')||Session::has('info')||Session::has('primary'))
  <div class="alert-container">
    @php
    $alertType = (String) getSessionKeyForAlert();
    @endphp
    <div class="floating-alert alert toast-alert-{{ $alertType }} alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ Session("$alertType") }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
  @endif

  <div class="wrapper">

    @include('admin.partials.top_navbar')

    <!-- Main Sidebar Container -->
    @include('admin.partials.main_sidebar')

    @yield('content')

    <footer class="main-footer no-print">

      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="/adminlte/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  {{-- <script src="/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
  <!-- jQuery Knob Chart -->
  <script src="/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="/adminlte/plugins/moment/moment.min.js"></script>
  <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/adminlte/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="/adminlte/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/adminlte/dist/js/demo.js"></script>
  @stack('child-scripts')

  <!-- general scripts -->
  <script src="/adminlte/dist/js/udo.js"></script>


  @yield('script')


</body>


</html>