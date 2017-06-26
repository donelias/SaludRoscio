<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Salud Roscio') }}</title>
    @include('layouts.js')
    @include('layouts.css')

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>


    
    <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script>
    
</head>
<body>
@include('layouts.menu')

@if(\Session::has('message'))
        @include('layouts.message')
    @endif

@yield('content')

@include('layouts.footer')


    </div>


    @yield('scripts')

    @yield('bottom')

    <script>
        function baseUrl(url) {
            return '{{url('')}}/' + url;
        }
    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

           
</body>
</html>
