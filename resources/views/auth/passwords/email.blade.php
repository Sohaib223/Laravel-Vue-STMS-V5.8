@extends('layouts.app')

@section('content')
<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="bg-image" style="background-image: url({{asset('assets/media/photos/photo34@2x.jpg')}});">
        <div class="row mx-0 bg-black-op">
            <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                <div class="p-30 invisible" data-toggle="appear">
                    <p class="font-size-h3 font-w600 text-white">
                        Get Inspired and Create.
                    </p>
                    <p class="font-italic text-white-op">
                        Copyright &copy; <span class="js-year-copy">2019</span>
                    </p>
                </div>
            </div>
            <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                <div class="content content-full">
                    <!-- Header -->
                    <div class="px-30 py-10">
                        <a class="link-effect font-w700" href="index.html">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
                        </a>
                        <h1 class="h3 font-w700 mt-30 mb-10">Forget Your Password?</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">Enter Your Email</h2>
                        @if(session()->has('message'))
                            <div class="alert alert-success" style="margin-top:13px;">{{ session()->get('message') }}</div>
                        @endif
                    </div>
                    <!-- END Header -->

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="get" action="{{ url('login') }}">
                           
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="login-username" value="{{ old('email') }}" autofocus >
                                        <label for="login-username">Email</label>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                    <i class="si si-login mr-10"></i> Send Password Reset Link
                                </button>
                                <div class="mt-30">
                                    <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{route('register')}}">
                                        <i class="fa fa-plus mr-5"></i> Create Account
                                    </a>
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{url('login')}}">
                                        <i class="fa fa-user mr-5"></i> Sign In
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->
@endsection
