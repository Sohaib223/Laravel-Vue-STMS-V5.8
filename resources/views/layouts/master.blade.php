<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>S.T.M.S Smart Traffic Management System</title>

        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('uploads/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
        <!-- END Icons -->

        <!-- Stylesheets -->

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
        <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/sweetalert.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.min.css">
        <link rel="stylesheet" id="css-main" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">


    </head>
    <style>
        .block-header-default {
            background-color: #3f9ce8;
            
        }
        .block-header-default .block-title{
            
            color : white !important;
        }
        .content-heading {
            border-bottom: 1px solid #3f9ce8;
        }
        .pagination {

            justify-content: center;
        }
    </style>
    <body>
      
        <div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-fixed page-header-glass page-header-inverse main-content-boxed side-trans-enabled">
            <input type="hidden" id="baseUrl" value="{{url('/')}}">
            <input type="hidden" id="roleId" value="{{auth()->user()->role}}">
            <input type="hidden" id="userId" value="{{auth()->user()->id}}">
            <input type="hidden" id="userName" value="{{auth()->user()->name}}">
            <input type="hidden" id="reg_no" value="{{auth()->user()->reg_no}}">

            @if (auth()->user()->role*1 === 1)
                <input type="hidden" id="userId2" value="{{auth()->user()->id}}">
            @else
                @php
                    $customer = App\Customers::where('user_id','=',auth()->user()->id)->first();
                @endphp
                <input type="hidden" id="userId2" value="{{$customer->id}}">
            @endif

            <!-- Sidebar -->
            <div id="app">
                @yield('content')
            </div>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        

        <script src="{{ asset('assets/js/codebase.core.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
        <!-- Page JS Plugins -->
        <script src="{{ asset('assets/js/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>

        <!-- Page JS Code -->
        <script src="{{ asset('assets/js/pages/be_pages_dashboard.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.3/daterangepicker.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

        <script src="{{ asset('js/app.js') }}"></script>
        
    </body>
</html>.