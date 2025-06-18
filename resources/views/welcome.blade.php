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
                <livewire:sheets.form/>
            </div>
        </div>

        <!-- Recent Entries Section -->
        <div class="bg-white dark:bg-zinc-900 shadow-sm ring-1 ring-zinc-950/5 dark:ring-white/10 rounded-lg">
            <div class="border-b border-zinc-950/5 dark:border-white/10 px-6 py-4">
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">Recent Entries</h2>
                <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Latest submissions from the Google Sheet</p>
            </div>
            <div class="px-6 py-6">
                <livewire:sheets.posts/>
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
                    <flux:button
                        href="https://github.com/invokable/google-sheets-project"
                        target="_blank"
                        icon="folder-git-2"
                        variant="primary"
                        color="zinc">
                        View Source Code
                    </flux:button>

                    <flux:button
                        href="https://docs.google.com/spreadsheets/d/1SUNw7QzAMx-xXUwr5s-mJrZC9NGFRl4RqyzSL6CogkQ/edit?usp=sharing"
                        target="_blank"
                        icon="book-open-text">
                        View Live Sheet
                    </flux:button>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layouts.simple>
