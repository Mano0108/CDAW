<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
        <!-- Styles -->
        
    

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        @yield('style')

        
    </head>
    <body>
        @yield('content')
    </body>
    <footer>
        <script src="//code.jquery.com/jquery-3.5.1.js" ></script>
        @yield('script')
    </footer>
</html>