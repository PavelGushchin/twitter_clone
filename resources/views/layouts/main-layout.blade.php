<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Twitter Clone') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="font-sans antialiased bg-white text-black">

        <!-- Main Container -->
        <div class="flex min-h-screen">

            <!-- Left Sidebar -->
            <section class="lg:w-1/5 shadow overflow-hidden min-h-screen">
                <div class="mx-auto py-6 px-4">

                    <!-- Main Menu -->
                    @include('left-sidebar.main-menu')
                </div>
            </section>

            <!-- Main Content -->
            <main class="flex-auto pt-6 shadow lg:w-1/2">
                <div class="flex-auto">
                    {{ $slot }}
                </div>
            </main>

            <!-- Right Sidebar -->
            <section class="lg:w-2/7 px-4 pt-4 shadow">
                @include('right-sidebar.search')

                @include('right-sidebar.who-to-follow')
            </section>
        </div>
    </body>
</html>
