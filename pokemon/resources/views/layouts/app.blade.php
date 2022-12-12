<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }} " type="text/css">
    <script>{{ URL::asset('js/app.css') }} </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @stack('style')

</head>

<body>

    <!-- Page Content -->
    {{ $slot }}

</body>

<footer>
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    @stack('script')
</footer>

</html>
