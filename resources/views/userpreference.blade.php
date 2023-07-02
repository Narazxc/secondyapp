<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css','resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="antialiased">
          
        
    <div class="container-lg m-0 flex justify-center h-screen items-center">
        <!-- Wrapper for box-shadow -->
        <div class="shadow-md w-3/4 h-3/4 rounded-md">
            
            @livewire('user-preference-form')

        </div>
    
    </div>


        @livewireScripts
    </body>
</html>



