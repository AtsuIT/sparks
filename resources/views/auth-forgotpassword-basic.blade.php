@extends('layouts.master-without-nav')
@section('title')Forgot Password @endsection
@section('content')

    <div class="auth-bg-basic d-flex align-items-center min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 py-5 px-3">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="text-center text-muted mb-2">
                            <div class="pb-3">
                                <a href="index">
                                    <span class="logo-lg">
                                        <img src="{{URL::asset('assets/images/logo-sm.svg')}}" alt="" height="24"> <span class="logo-txt">Vuesy</span>
                                    </span>
                                </a>
                                <p class="text-muted font-size-15 w-75 mx-auto mt-3 mb-0">User Experience &amp; Interface Design Strategy Saas Solution</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-transparent shadow-none border-0">
                            <div class="card-body">
                                <div class="py-3">
                                    <div class="text-center">
                                        <h5 class="mb-0">Forgot Password</h5>
                                        <p class="text-muted mt-2">Forgot Your Password?</p>
                                    </div>
                                    <form class="mt-4 pt-2">
                                        <div class="form-floating form-floating-custom mb-3">
                                            <input type="password" class="form-control" id="input-newpassword" placeholder="Password">
                                            <label for="input-newpassword">New Password</label>
                                            <div class="form-floating-icon">
                                                <i class="uil uil-padlock"></i>
                                            </div>
                                        </div>

                                        <div class="form-floating form-floating-custom mb-3">
                                            <input type="password" class="form-control" id="input-confirmpassword" placeholder="Password">
                                            <label for="input-confirmpassword">Confirm Password</label>
                                            <div class="form-floating-icon">
                                                <i class="uil uil-check-circle"></i>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Reset</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="text-muted mb-0">Remember It ? <a href="auth-signin-basic" class="fw-semibold text-decoration-underline"> Sign In </a> </p>
                                        </div>

                                    </form><!-- end form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="mt-4 mt-md-5 text-center">
                            <p class="mb-0">© <script>
                                    document.write(new Date().getFullYear())

                                </script> Vuesy. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div>
        <!-- end container fluid -->
    </div>
    <!-- end authentication section -->
@endsection
