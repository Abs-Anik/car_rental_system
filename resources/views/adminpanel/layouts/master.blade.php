<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    @yield('title')
  </title>
  @include('adminpanel.layouts.partials.style')
  <style>
    .select2-container--default .select2-selection--single {
        border-radius: 0.25rem !important;
        box-shadow: inset 0 0 0 transparent;
    }
  </style>
  @yield('extra_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('public/adminpanel/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
@include('adminpanel.layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('adminpanel.layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
@yield('content')
  <!-- /.content-wrapper -->
@include('adminpanel.layouts.partials.footer')

  <!-- Control Sidebar -->
  {{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside> --}}
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('adminpanel.layouts.partials.script')
@yield('extra_js')
</body>
</html>
