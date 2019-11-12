<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_csrf" content="{{csrf_token()}}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_csrf_header" content="_token"/>

    <title>{{ 'Furniture' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
{{--    <script src="{{asset('js/bootstrap.min.js')}}"></script>--}}
    <script src="https://threejs.org/build/three.min.js"></script><!--r83-->
    <script src="https://threejs.org/examples/js/controls/OrbitControls.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/16.3.5/Tween.min.js"></script>
    <script src="https://cdn.rawgit.com/mrdoob/three.js/master/examples/js/libs/stats.min.js"></script>


    <style>
        .section-relative {
            background: #edf0f0;
        }
        .btn-anis-effect.btn-danger {
            /*background: #f54b0f;*/
        }

        .btn {
            padding: 12px 24px !important;
        }

        .img-fluid {
            width: 100%;
        }



        .container {
            width: 100% !important;
            max-width: 100% !important;
        }

        .rd-navbar-inner {
            max-width: 100% !important;
        }


        .rd-navbar-default.rd-navbar-static .rd-navbar-nav > li + li, .rd-navbar-floated.rd-navbar-static .rd-navbar-nav > li + li, .rd-navbar-top-panel.rd-navbar-static .rd-navbar-nav > li + li {
            margin-left: 8px !important;
        }
    </style>



    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" href="{{ asset('favicon.jpg') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/style_1.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/style_2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('css4page')
{{--    <link href="{{ asset('css/style_2.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">


</head>
<body>

    <div class="page text-center">
        <header class="page-head">
            <!-- RD Navbar Transparent-->
            @yield('nav')

        </header>
        @yield('content')

    </div>

    @yield('modal')
    <input type="hidden" id="asset_path" value="<?=asset('');?>">
    <input type="hidden" id="home_path" value="<?=url('');?>">
    <input id="default_image_path" type="hidden" value="<?=asset('image/');?>/"/>
    @yield('js4event')

    <script>



    </script>

</body>
</html>
