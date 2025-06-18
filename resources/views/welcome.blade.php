<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ config('app.name') }}</h2>
                        <p class="text-gray-600 mb-4">
                            Service Account sample for Google Sheets integration.
                        </p>
                        <div class="flex space-x-4">
                            <a href="https://github.com/invokable/laravel-google-sheets"
                               target="_blank"
                               class="text-indigo-600 hover:text-indigo-800 underline font-medium">
                                GitHub Repository
                            </a>
                            <a href="https://docs.google.com/spreadsheets/d/1SUNw7QzAMx-xXUwr5s-mJrZC9NGFRl4RqyzSL6CogkQ/edit?usp=sharing"
                               target="_blank"
                               class="text-indigo-600 hover:text-indigo-800 underline font-medium">
                                View Google Sheet
                            </a>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <livewire:sheets.form />
                        <livewire:sheets.posts />
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Live Google Sheet</h3>
                    <iframe
                        src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDD2rjbgkrd8JCWGZg2qD59ZVMz31ZwaUAXLcRH7ng4_uAJQwSuBn2BKIlE9W7610qXigH6gU7krZc/pubhtml?gid=0&amp;single=true&amp;widget=true&amp;headers=false"
                        class="w-full h-96 border border-gray-200 rounded">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
