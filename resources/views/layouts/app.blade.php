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
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/a35b8b496f.js" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <!-- Page Heading -->
            @if (isset($header))
                {{ $header }}
            @endif

            <!-- Mensajes de session -->
            @if(session()->exists('status'))
                <div class="w-100 pt-4 text-success d-flex justify-content-center">
                    <p class="fs-4">{{ session()->get('status') }}</p>
                </div>
            @endif

            <!-- Page Content -->
            <main class="container p-4">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
