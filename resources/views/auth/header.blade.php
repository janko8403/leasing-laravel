<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="main">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="colors">
                        <div class="c1"></div>
                        <div class="c2"></div>
                        <div class="c3"></div>
                        <div class="c4"></div>
                        <div class="c5"></div>
                        <div class="c6"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="spacer s2"></div>
                    <a href="/">
                        <img class="img-fluid img-center" src="images/logo.png" alt="mbank">
                    </a>
                </div>
            </div>
        </div>

        @yield('content')

    </div>


    <footer>
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img class="float-right" src="images/corpo.png" alt="mbank">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="colors">
                        <div class="c"></div>
                        <div class="c4"></div>
                        <div class="c5"></div>
                        <div class="c6"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
   
</body>
</html>
