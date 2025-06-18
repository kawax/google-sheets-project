<x-layouts.app title="Google Sheets Demo">
    <flux:main>
        <div class="p-6">
            <flux:heading size="xl">Google Sheets Integration Demo</flux:heading>
            <flux:subheading>Submit data to Google Sheets and view recent entries in real-time</flux:subheading>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">
            <!-- Form Section -->
            <flux:card>
                <flux:card.header>
                    <flux:heading size="lg">Add New Entry</flux:heading>
                    <flux:subheading>Submit data to your Google Sheet</flux:subheading>
                </flux:card.header>

                <flux:card.body class="space-y-4">
                    <livewire:sheets.form />
                </flux:card.body>
            </flux:card>

            <!-- Recent Entries Section -->
            <flux:card>
                <flux:card.header>
                    <flux:heading size="lg">Recent Entries</flux:heading>
                    <flux:subheading>Latest submissions from the Google Sheet</flux:subheading>
                </flux:card.header>

                <flux:card.body>
                    <livewire:sheets.posts />
                </flux:card.body>
            </flux:card>
        </div>

        <!-- Additional Info Section -->
        <div class="p-6">
            <flux:card>
                <flux:card.header>
                    <flux:heading size="lg">About This Demo</flux:heading>
                </flux:card.header>
                
                <flux:card.body class="space-y-4">
                    <p class="text-zinc-600 dark:text-zinc-400">
                        This application demonstrates real-time Google Sheets integration using Laravel and Livewire.
                        Data submitted through the form is instantly saved to a Google Sheet via the Google Sheets API.
                    </p>
                    
                    <div class="flex flex-wrap gap-4">
                        <flux:button href="https://github.com/invokable/google-sheets-project" target="_blank" variant="outline" icon="folder-git-2">
                            View Source Code
                        </flux:button>
                        
                        <flux:button href="https://docs.google.com/spreadsheets/d/1SUNw7QzAMx-xXUwr5s-mJrZC9NGFRl4RqyzSL6CogkQ/edit?usp=sharing" target="_blank" variant="outline" icon="table">
                            View Live Sheet
                        </flux:button>
                    </div>
                </flux:card.body>
            </flux:card>
        </div>
    </flux:main>
</x-layouts.app>
