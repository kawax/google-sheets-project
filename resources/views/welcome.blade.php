<x-guest-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 p-6">
        <div>
            <h1 class="text-3xl">{{ config('app.name') }}</h1>
            <p>
                Service Account.
                <a href="https://github.com/kawax/laravel-google-sheets"
                   target="_blank"
                   class="text-indigo-500 underline">GitHub</a>
                <a href="https://docs.google.com/spreadsheets/d/1SUNw7QzAMx-xXUwr5s-mJrZC9NGFRl4RqyzSL6CogkQ/edit?usp=sharing"
                   target="_blank"
                   class="text-indigo-500 underline">Google Sheets</a>
            </p>

            <livewire:sheets.form></livewire:sheets.form>
            <livewire:sheets.posts></livewire:sheets.posts>
        </div>
        <div>
            <iframe
                src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSDD2rjbgkrd8JCWGZg2qD59ZVMz31ZwaUAXLcRH7ng4_uAJQwSuBn2BKIlE9W7610qXigH6gU7krZc/pubhtml?gid=0&amp;single=true&amp;widget=true&amp;headers=false"
                class="p-1 w-full h-full"></iframe>
        </div>
    </div>
</x-guest-layout>
