<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin PANEL | {{ Str::upper(Route::currentRouteName()) }} </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">

    {{-- my added styles --}}
  <link rel="stylesheet" href="adminlte/dist/css/main.css">


  @yield('header_style')
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
  <div class=d-none id="data-box" all_products='{{ $all_products }}'>
    marry me
  </div>

<body class="hold-transition sidebar-mini @if(Route::currentRouteName() == 'pos'){{ "sidebar-collapse"}}@endif">
  <div class="wrapper">
    <!-- Navbar -->
    @include('partials.top_navbar')

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('partials.main_sidebar')

    @yield('content')
    
<footer class="main-footer no-print" style='bottom:0, position: fixed;'>
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.0.5
  </div>
  <strong>Copyright &copy; 2022 
  {{-- <a href="http://adminlte.io">AdminLTE.io</a>.</strong>  --}}
  All rights
  reserved.<a

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside><!-- /.control-sidebar -->
</div><!-- ./wrapper -->

@stack('child-scripts')
{{-- 
implementation in each view 
@push('child-scripts')
 @include('partials.js.header_fixed') 
@endpush
 --}}
<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/dist/js/demo.js"></script>
</body>
</html>
    