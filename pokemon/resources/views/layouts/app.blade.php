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

        <!-- Styles -->
        @livewireStyles
        @stack('style')

    </head>
    <body>
        
        <div>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
        @if (isset($test))    
        {{ $test }}
        @endif
            <!-- Page Content -->
                {{ $slot }}
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    <footer>
        <script src="//code.jquery.com/jquery-3.5.1.js" ></script>
        @stack('script')
    </footer>
</html>
