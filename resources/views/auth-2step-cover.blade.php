@extends('layouts.master-without-nav')
@section('title')Two Step Verification @endsection
@section('content')

<div class="auth-page d-flex align-items-center min-vh-100">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="d-flex flex-column h-100 py-5 px-4">
                    <div class="text-center text-muted mb-2">
                        <div class="pb-3">
                            <a href="index">
                                <span class="logo-lg">
                                    <img src="{{URL::asset('assets/images/logo-sm.svg')}}" alt="" height="24"> <span class="logo-txt">Sparks</span>
                                </span>
                            </a>
                            <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">User Experience & Interface Design Strategy Saas Solution</p>
                        </div>
                    </div>

                    <div class="my-auto">
                        <div class="p-3 text-center">
                            <img src="{{URL::asset('assets/images/auth-img.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>

                    <div class="mt-4 mt-md-5 text-center">
                        <p class="mb-0">© <script>
                                document.write(new Date().getFullYear())

                            </script> Sparks. Crafted with <i class="mdi mdi-heart text-danger"></i> by Atsu IT</p>
                    </div>
                </div>

                <!-- end auth full page content -->
            </div>
            <!-- end col -->

            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg bg-light py-md-5 p-4 d-flex">
                    <div class="bg-overlay-gradient"></div>
                    <!-- end bubble effect -->
                    <div class="row justify-content-center g-0 align-items-center w-100">
                        <div class="col-xl-4 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="px-3 py-3">
                                        <div class="mb-4 mb-md-5">
                                            <div class="avatar-lg mx-auto">
                                                <div class="avatar-title bg-soft-primary text-primary display-5 rounded-circle">
                                                    <i class="uil uil-envelope-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 mb-md-5 text-center">
                                            <h4>Verify Your Email</h4>
                                            <p class="text-muted">Please enter the 4 digit code sent to <span class="fw-semibold">example@abc.com</span></p>
                                        </div>

                                        <form>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="digit1-input" class="visually-hidden">Dight 1</label>
                                                        <input type="text" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 2)" maxLength="1" id="digit1-input">
                                                    </div>
                                                </div><!-- end col -->

                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="digit2-input" class="visually-hidden">Dight 2</label>
                                                        <input type="text" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 3)" maxLength="1" id="digit2-input">
                                                    </div>
                                                </div><!-- end col -->

                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="digit3-input" class="visually-hidden">Dight 3</label>
                                                        <input type="text" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 4)" maxLength="1" id="digit3-input">
                                                    </div>
                                                </div><!-- end col -->

                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="digit4-input" class="visually-hidden">Dight 4</label>
                                                        <input type="text" class="form-control form-control-lg text-center" onkeyup="moveToNext(this, 4)" maxLength="1" id="digit4-input">
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </form><!-- end form -->

                                        <div class="mt-4">
                                            <a href="#" class="btn btn-primary w-100">Confirm</a>
                                        </div>

                                        <div class="mt-4 pt-3 text-center">
                                            <p class="text-muted mb-0">Didn't receive a code ? <a href="#" class="fw-semibold text-decoration-underline"> Resend </a> </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>
<!-- end authentication section -->

@endsection
@section('script')
<!-- two-step-verification js -->
<script src="{{ URL::asset('assets/js/pages/two-step-verification.init.js') }}"></script>
@endsection
