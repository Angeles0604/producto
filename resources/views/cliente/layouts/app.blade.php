<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Zapatería Online')</title>
    @vite('resources/css/app.css') <!-- Enlace para Vite -->
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900">
    @include('cliente.layouts.header')
    <main class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
        @yield('content')
    </main>
    @include('cliente.layouts.footer')
    @vite('resources/js/app.js')
</body>
</html>
