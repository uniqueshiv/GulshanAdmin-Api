<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <!-- Styles -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    </head>
    <body>
      <div id="app">
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
           <div class="container">
             <div class="jumbotron">
               <h1>Bootstrap Tutorial</h1>
               <p>Bootstrap is the most popular HTML, CSS...</p>
             </div>
           </div>



        </div>
    </div>
        <script src="{{ asset('js/app.js') }}">

        </script>
    </body>
</html>
