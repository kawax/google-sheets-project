<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <!-- Desktop Sidebar -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-zinc-200 bg-zinc-50 px-6 pb-4 dark:border-zinc-700 dark:bg-zinc-900">
                <div class="flex h-16 shrink-0 items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2" wire:navigate>
                        <x-app-logo />
                    </a>
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <a href="{{ route('home') }}" 
                                       class="flex gap-x-3 rounded-md px-2 py-1 text-sm font-semibold leading-6 {{ request()->routeIs('home') ? 'bg-zinc-800 text-white dark:bg-zinc-100 dark:text-zinc-900' : 'text-zinc-700 hover:bg-zinc-800 hover:text-white dark:text-zinc-200 dark:hover:bg-zinc-100 dark:hover:text-zinc-900' }}"
                                       wire:navigate>
                                        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                        </svg>
                                        Home
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="mt-auto">
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <a href="https://github.com/invokable/google-sheets-project" 
                                       target="_blank"
                                       class="group flex gap-x-3 rounded-md px-2 py-1 text-sm font-semibold leading-6 text-zinc-700 hover:bg-zinc-800 hover:text-white dark:text-zinc-200 dark:hover:bg-zinc-100 dark:hover:text-zinc-900">
                                        <svg class="h-6 w-6 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                        Repository
                                    </a>
                                </li>
                                <li>
                                    <a href="https://laravel.com/docs/livewire" 
                                       target="_blank"
                                       class="group flex gap-x-3 rounded-md px-2 py-1 text-sm font-semibold leading-6 text-zinc-700 hover:bg-zinc-800 hover:text-white dark:text-zinc-200 dark:hover:bg-zinc-100 dark:hover:text-zinc-900">
                                        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25A8.966 8.966 0 0 1 18 3.75c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                        </svg>
                                        Livewire Docs
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="lg:hidden">
            <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-zinc-200 bg-white px-4 shadow-sm dark:border-zinc-700 dark:bg-zinc-900 sm:gap-x-6 sm:px-6">
                <button type="button" class="-m-2.5 p-2.5 text-zinc-700 dark:text-zinc-200 lg:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                
                <div class="h-6 w-px bg-zinc-900/10 dark:bg-white/10 lg:hidden"></div>
                
                <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-200">Google Sheets Demo</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="lg:pl-72">
            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>

        @livewireScripts
    </body>
</html>