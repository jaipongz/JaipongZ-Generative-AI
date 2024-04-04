<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JaipongZIndustry</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>


<body>
    <div class="loadder" id="loadder" style="display: none">
        <div class="center">
            <div class="ring"></div>
            <span>Generating...</span>
        </div>
    </div>
    <div class="container" id="container">
        @include("layouts.aside")
        

        {{-- Main block --}}
        @yield('content')
        {{-- End Of Main --}}

        {{-- @include("includes.rigth") --}}
    </div>
</body>

</html>
