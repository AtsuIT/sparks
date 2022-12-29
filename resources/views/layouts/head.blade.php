
@yield('css')
<!-- plugin css -->
<link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- swiper css -->
<link href="{{ URL::asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@if (App::getLocale() == "en")
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@else
   <!-- Bootstrap Css -->
   <link href="{{ URL::asset('assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="{{ URL::asset('assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> 
@endif
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Sweet Alert-->
<link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
<!-- DATATABLES-->
<link href="{{ URL::asset('assets/libs/dataTables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/dataTables/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
{{-- @yield('css') --}}
