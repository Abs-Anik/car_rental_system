<!-- jQuery -->
<script src="{{asset('public/adminpanel/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/adminpanel/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/adminpanel/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/adminpanel/assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/adminpanel/assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/adminpanel/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/adminpanel/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/adminpanel/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/adminpanel/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/adminpanel/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/adminpanel/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/adminpanel/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/adminpanel/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/adminpanel/assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/adminpanel/assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/adminpanel/assets/dist/js/pages/dashboard.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{asset('public/adminpanel/assets/select/js/select2.min.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('public/adminpanel/assets/dropify/js/dropify.min.js') }}"></script>

<script src="{{asset('public/adminpanel/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
  $(document).ready(function() {
      $('.summernote').summernote({
          height: 100
      });
  });
</script>

<script>
  $(".dropify").dropify();
</script>

<script>
  $(".roles_select").select2({
      placeholder: "Select Roles to Assign for Access Pages"
  });
</script>

<script type="text/javascript">
  $('.show_confirm').click(function(event) {
  var form = $(this).closest("form");
  var name = $(this).data("name");
  event.preventDefault();
  swal({
      title: "Are you sure you want to delete this record?",
      text: "If you delete this, it will be gone forever.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
      if (willDelete) {
          form.submit();
      }
      });
  });
</script>

<script>
  @if (Session::has('Message'))
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch(type){
      case 'info':
      toastr.info("{{ Session::get('Message') }}");
      break;

      case 'warning':
      toastr.warning("{{ Session::get('Message') }}");
      break;

      case 'success':
      toastr.success("{{ Session::get('Message') }}");
      break;

      case 'error':
      toastr.error("{{ Session::get('Message') }}");
      break;
      }
  @endif
</script>