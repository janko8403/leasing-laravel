<!DOCTYPE html>
<html style="height: 100%;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>RentCar</title>

        <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">

    </head>

  <body class="access-denied">

    <div class="container-fluid">
        <div class="row row-no-padding">
    
            <div class="col-md-12 text-center">

                @yield('content')

            </div>
    
        </div>
    </div>

  </body>
</html>   