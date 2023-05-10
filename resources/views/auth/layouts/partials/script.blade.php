  <!-- plugins:js -->
  <script src="{{asset('public/userpanel/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('public/userpanel/assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('public/userpanel/assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('public/userpanel/assets/js/template.js')}}"></script>
  <script src="{{asset('public/userpanel/assets/js/settings.js')}}"></script>
  <script src="{{asset('public/userpanel/assets/js/todolist.js')}}"></script>
  <!-- endinject -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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