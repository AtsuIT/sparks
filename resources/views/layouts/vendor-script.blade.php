<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script>
    var lang = "<?= App::getLocale() ?>";
</script> 
<!-- DATATABLES -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js') }}" ></script>
<script src="{{ URL::asset('assets/libs/dataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/dataTables/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@yield('script')
@yield('script-bottom')


