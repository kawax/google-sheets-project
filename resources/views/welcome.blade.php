<x-layouts.simple title="Google Sheets Demo">
    <div class="mb-8">
        <flux:heading size="xl">Google Sheets Integration Demo</flux:heading>
        <flux:subheading>Submit data to Google Sheets and view recent entries in real-time</flux:subheading>
    </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Form Section -->
            <div class="bg-white dark:bg-zinc-900 shadow-sm ring-1 ring-zinc-950/5 dark:ring-white/10 rounded-lg">
                <div class="border-b border-zinc-950/5 dark:border-white/10 px-6 py-4">
                    <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">Add New Entry</h2>
                    <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Submit data to our Google Sheet</p>
                </div>
                <div class="px-6 py-6">
                    <livewire:sheets.form />
                </div>
            </div>

            <!-- Recent Entries Section -->
            <div class="bg-white dark:bg-zinc-900 shadow-sm ring-1 ring-zinc-950/5 dark:ring-white/10 rounded-lg">
                <div class="border-b border-zinc-950/5 dark:border-white/10 px-6 py-4">
                    <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">Recent Entries</h2>
                    <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Latest submissions from the Google Sheet</p>
                </div>
                <div class="px-6 py-6">
                    <livewire:sheets.posts />
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="mt-8">
            <div class="bg-white dark:bg-zinc-900 shadow-sm ring-1 ring-zinc-950/5 dark:ring-white/10 rounded-lg">
                <div class="border-b border-zinc-950/5 dark:border-white/10 px-6 py-4">
                    <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">About This Demo</h2>
                </div>
                <div class="px-6 py-6 space-y-4">
                    <p class="text-zinc-600 dark:text-zinc-400">
                        This application demonstrates real-time Google Sheets integration using Laravel and Livewire.
                        Data submitted through the form is instantly saved to a Google Sheet via the Google Sheets API.
                    </p>

                    <div class="flex flex-wrap gap-4">
                        <a href="https://github.com/invokable/google-sheets-project"
                           target="_blank"
                           class="inline-flex items-center gap-x-2 rounded-md bg-zinc-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-zinc-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-zinc-600">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            View Source Code
                        </a>

                        <a href="https://docs.google.com/spreadsheets/d/1SUNw7QzAMx-xXUwr5s-mJrZC9NGFRl4RqyzSL6CogkQ/edit?usp=sharing"
                           target="_blank"
                           class="inline-flex items-center gap-x-2 rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-zinc-900 shadow-sm ring-1 ring-inset ring-zinc-300 hover:bg-zinc-50 dark:bg-zinc-800 dark:text-white dark:ring-zinc-600 dark:hover:bg-zinc-700">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75A1.125 1.125 0 0 1 2.25 18.375m0 0V5.625A1.125 1.125 0 0 1 3.375 4.5h17.25A1.125 1.125 0 0 1 21.75 5.625v12.75m0 0a1.125 1.125 0 0 1-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-3.75m-1.5 1.125V18"/>
                            </svg>
                            View Live Sheet
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.simple>
