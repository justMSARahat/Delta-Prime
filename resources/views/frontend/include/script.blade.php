<!-- JS here -->
<script src="{{ asset('Frontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/vendor/waypoints.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/jquery-ui-slider-range.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/main.js') }}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    @if ( Session::has('message') )
         var type = "{{ Session::get('alert-type','info') }}";

         switch (type){
             case 'info':

                 toastr.options.positionClass = 'toast-bottom-left';
                 toastr.info("{{ Session::get('message') }}");
             break;

             case 'success':
                toastr.options.positionClass = 'toast-bottom-left';
                toastr.success("{{ Session::get('message') }}");
             break;

             case 'warning':
                toastr.options.positionClass = 'toast-bottom-left';
                toastr.warning("{{ Session::get('message') }}");
             break;

             case 'error':
                toastr.options.positionClass = 'toast-bottom-left';
                toastr.error("{{ Session::get('message') }}");
             break;
     }
     @endif
</script>
<script>
toastr.options = {
  "closeButton": true,
  "debug": true,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-bottom-left",
  "preventDuplicates": true,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
