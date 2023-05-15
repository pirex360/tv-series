<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Flatpickr -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>

        @livewireStyles
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>TV Series</h1>
                <hr>

                <livewire:tv-series-schedule></livewire:tv-series-schedule>

            </div>
        </div>

        @livewireScripts
    </body>
</html>
