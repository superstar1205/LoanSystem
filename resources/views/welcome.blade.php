<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.13/fc-3.2.2/fh-3.1.2/r-2.1.0/sc-1.4.2/datatables.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
        <style>
            .row{
                margin:0px 0px;
                padding:0px 0px;
            }
            .row>* {
                padding:0px 0px;
                margin: 0px 0px;
            }
            .dgr{
                background-image: linear-gradient(to right, rgba(54, 120, 220, 0.98), rgba(54, 120, 220, 0.5));
            }
            .dright{
                width:100%;
                height:100%;
            }
            .dlogo{
                width:100%;
            }
            .bg-img{
                width:100%;
                height:100vh;
            }
        </style>
    </head>
        
    <body>
        <div class="row">
            <div class="col-md-3 dgr">
                <div>
                    <div class="p-3">
                        @if (Route::has('login'))
                        <div class="d-flex float-end">
                            @auth
                            <a href="{{ url('/home') }}" class="px-3">
                                <h1>Home</h1>
                            </a>
                            @else
                            <a href="{{ route('login') }}" class="px-3">
                                <h1>Log in</h1>
                            </a>
            
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">
                                <h1>Register</h1>
                            </a>
                            @endif
                            @endauth
                        </div>
                        @endif
                    </div>
                    <div class="dright">
                        <img class="dlogo" src="{{ asset('img/logo.svg') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <img class="bg-img" src="{{ asset('img/background.jpg') }}">
            </div>
        </div>
    </body>
</html>
