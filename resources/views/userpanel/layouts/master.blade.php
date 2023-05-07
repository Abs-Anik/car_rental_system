<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('title')
  </title>
  @include('userpanel.layouts.partials.style')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('userpanel.layouts.partials.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('userpanel.layouts.partials.setting')
      @include('userpanel.layouts.partials.sidebar')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('userpanel.layouts.partials.sidenavbar')
      <!-- partial -->
      <div class="main-panel">
        @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('userpanel.layouts.partials.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

 @include('userpanel.layouts.partials.script')
</body>

</html>

