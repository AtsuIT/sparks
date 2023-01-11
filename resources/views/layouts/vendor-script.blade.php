<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/metismenujs/metismenujs.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script>
    var lang = "<?= App::getLocale() ?>";
    var title = "<?= Lang::get('t-are-you-sure') ?>";
    var text = "<?= Lang::get('t-confirm') ?>";
    var yes = "<?= Lang::get('t-yes') ?>";
    var failed = "<?= Lang::get('t-failed') ?>";
    var done = "<?= Lang::get('t-done') ?>";
    var dismiss = "<?= Lang::get('t-dismiss') ?>";

</script> 
<!-- DATATABLES -->
<script src="{{ URL::asset('js/jquery/jquery.min.js') }}" ></script>
<script src="{{ URL::asset('dataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('dataTables/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@yield('script')
@yield('script-bottom')


