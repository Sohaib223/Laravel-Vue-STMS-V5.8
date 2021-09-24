@extends('layouts.app')

@section('content')
 <!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url({{asset('assets/media/photos/photo34@2x.jpg')}});">
        <div class="row mx-0 bg-earth-op">
            <div class="hero-static col-md-12 col-xl-12 d-none d-md-flex align-items-md-end">
                <div class="p-30 invisible" data-toggle="appear">
                    <p class="font-size-h3 font-w600 text-white mb-5">
                        Thankyou For Your Confirmation. You Account Will Activated
                    </p>
                    <p class="font-size-h5 text-white">
                    <i class="fa fa-angles-right"></i> <a href="{{url('login')}}" style="color: black;
                    font-weight: 700;">Sign In</a>
                    </p>
                    <p class="font-italic text-white-op">
                        Copyright &copy; <span class="js-year-copy">2019</span>
                    </p>
                </div>
            </div>
            
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

@endsection
