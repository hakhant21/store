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
        <link rel="stylesheet" href="{{asset('/css/app.css') }}">
        <link rel="stylesheet" href="{{asset('/css/extra.css')}}">
      
    </head>
    <body class="bg-gray-800 opacity-200">
            <div class="max-w-6xl mx-auto py-12 px-4">
                <ul class="flex justify-between items-center">
                    <h1 class="text-gray-200 font-bold text-xl">Dashboard</h1>
                    <div class="flex itesm-center">
                        <a href="{{ route('users.edit') }}" class="text-gray-200 font-bold text-md px-2 block">Profile</a>
                        <a href="{{ route('orders.index') }}" class="text-gray-200 font-bold text-md px-2 block">Orders</a>
                    </div>
                </ul>
            </div>
            <div class="max-w-6xl mx-auto">
                <main class="bg-gray-800">
                    {{ $slot }}
                </main>
            </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
