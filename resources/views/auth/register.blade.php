@extends('layouts.app')

@section('content')
 <!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url({{asset('assets/media/photos/photo34@2x.jpg')}});">
        <div class="row mx-0 bg-earth-op">
            <div class="hero-static col-md-6 col-xl-6 d-none d-md-flex align-items-md-end">
                <div class="p-30 invisible" data-toggle="appear">
                    <p class="font-size-h3 font-w600 text-white mb-5">
                        We're very happy you are joining our community!
                    </p>
                    <p class="font-size-h5 text-white">
                        <i class="fa fa-angles-right"></i> Create your account today and receive 50% off.
                    </p>
                    <p class="font-italic text-white-op">
                        Copyright &copy; <span class="js-year-copy">2019</span>
                    </p>
                </div>
            </div>
            <div class="hero-static col-md-6 col-xl-6 d-flex align-items-center bg-white">
                <div class="content content-full">
                    <!-- Header -->
                    <div class="px-30 py-10">
                        <a class="link-effect font-w700" href="index.html">
                            <img src="{{ asset('uploads/logo.png') }}" style="width:200px" alt>
                        </a>
                        <h1 class="h3 font-w700 mt-20 mb-10">Create New Account</h1>
                        
                        @if(session()->has('message'))
                            <div class="alert alert-success" style="margin-top:13px;">{{ session()->get('message') }}</div>
                        @endif
                    </div>
                    <!-- END Header -->

                    <!-- Sign Up Form -->
                    <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <registration></registration>
                    <!-- END Sign Up Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

@endsection
