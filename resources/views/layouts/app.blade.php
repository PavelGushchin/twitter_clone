<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="font-sans antialiased">

        <!-- Main Container -->
        <div class="flex min-h-screen">

            <!-- Page Heading -->
            <header class="lg:w-1/5 shadow overflow-hidden min-h-screen">
                <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <x-main-menu />

                    <x-create-tweet-button />
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-auto p-6 shadow">
                <div class="flex-auto">
                    Main Content
                </div>
            </main>

            <!-- Right Sidebar -->
            <section class="lg:w-1/4 p-6 shadow">
                Sidebar
            </section>
        </div>
    </body>
</html>
