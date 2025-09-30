<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased dark:bg-black bg-gray-50 text-black dark:text-white/50">
        <div class="bg-gray-50 dark:bg-black dark:text-white/50">
            <div class="relative flex flex-col min-h-screen">
                <header class="flex justify-between items-center w-full bg-white dark:bg-gray-900 py-4 shadow px-8">
                    <div class="flex flex-row items-center container mx-auto px-4">
                        <h1 class="text-xl font-semibold mr-4">Laravel Livewire</h1>
                        <span class="w-px h-10 bg-gray-500"></span>
                        <ul class="flex flex-row gap-4">
                            <li>
                                <a href="/dashboard" class="block py-2 px-3 text-blue-500">Admin Dashboard</a>
                            </li>
                            <li>
                                <a href="/dashboard/articles" class="block py-2 px-3 text-blue-500">Articles</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-1/2">
                        <livewire:search placeholder="Type to search an article..."/>
                    </div>
                </header>
                <main class="mt-8 w-full px-4 lg:px-7 xl:px-0">
                    {{ $slot }}
                </main>
            </div>
        </div>
        <script data-navigate-once>
            // Broadcast a browser event equivalent to the old Alpine $dispatch
            // so Livewire #[On('search:clear-results')] can react without Alpine.
            window.addEventListener('click', () => {
                window.dispatchEvent(new CustomEvent('search:clear-results'));
            });
        </script>
    </body>
</html>
