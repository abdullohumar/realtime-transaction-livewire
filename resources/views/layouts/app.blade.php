<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="bg-slate-50 antialiased font-sans">
        <nav class="bg-white shadow-sm border-b border-slate-200 py-4 mb-8">
            <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
                <span class="text-xl font-bold text-indigo-600 tracking-tight">RealTime Transaction</span>
                <div class="text-slate-400 text-xs font-mono">v4.x Standard Mode</div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4">
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
