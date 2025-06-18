<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header class="border-b border-zinc-200 dark:border-zinc-700">
            <a href="{{ route('home') }}" class="flex items-center space-x-2" wire:navigate>
                <x-app-logo />
            </a>

            <flux:spacer />

            <div class="text-sm font-medium text-zinc-600 dark:text-zinc-400">
                Google Sheets Demo
            </div>
        </flux:header>

        <flux:main>
            {{ $slot }}
        </flux:main>

        @fluxScripts
    </body>
</html>