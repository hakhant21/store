<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('images/favicon.ico')}}" />

        <title>{{ config('app.name', 'Shopping | Cart') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link
            href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
            rel="stylesheet">

        <!-- Styles -->
        

        <link rel="stylesheet" href="{{asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{asset('/css/extra.css')}}">
      
    </head>
    <body class="bg-gray-800 opacity-200">
        <div class="max-w-6xl mx-auto">
             @include('_partials.header')
                <main class="bg-gray-800">
                    {{ $slot }}
                </main>
             @include('_partials.footer')
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
