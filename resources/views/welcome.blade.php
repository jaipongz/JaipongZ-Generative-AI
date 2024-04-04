<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JaipongZ Industry</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:900" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>

<body>
    <div class="content">
        <div class="box">

            @if (Route::has('login'))
                <div class="navbar">

                    @auth
                        <a href="{{ url('/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="element">
                <div class="head">
                    <h1>JaipongZ Generative</h1>
                </div>
                <div class="tran">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore error laboriosam beatae est
                        neque, alias magni id maiores totam! Iure laudantium perspiciatis nulla consequatur beatae culpa
                        mollitia debitis excepturi explicabo!</p>
                </div>
                <div class="pic">
                    <img src="{{ asset('images/sheep.png') }}" alt="">
                    <img src="{{ asset('images/beer.png') }}" alt="">
                    <img src="{{ asset('images/crab.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

</body>

</html>
