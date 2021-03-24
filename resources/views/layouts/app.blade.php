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
                <div class="mx-auto py-6 px-4">
                    <x-main-menu active="{{ $active }}" />

                    <x-create-tweet-button />
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-auto pt-6 shadow">
                <div class="flex-auto">
                    {{ $slot }}
                </div>
            </main>

            <!-- Right Sidebar -->
            <section class="lg:w-2/7 px-4 pt-4 shadow">
                <div>
                    <input class="w-full px-4 rounded-3xl text-gray-900"
                           type="text"
                           placeholder="Search Twitter"
                    />
                </div>

                <div class="bg-gray-100 rounded-xl mt-4 text-gray-900">
                    <div class="px-4 py-2 text-lg font-bold">
                        Who to follow
                    </div>
                    <hr>

                    <x-suggested-user />
                    <x-suggested-user />
                    <x-suggested-user />

                    <div class="p-4">
                        <a href="/i/connect_people?user_id={{ auth()->user()->id }}" class="text-blue-500 font-bold">
                            Show more
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
