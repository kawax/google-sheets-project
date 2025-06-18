<div>
    @if($this->posts->count() > 0)
        <div class="space-y-4">
            @foreach($this->posts as $post)
                <div class="bg-zinc-50 dark:bg-zinc-800 rounded-lg p-4 ring-1 ring-zinc-950/5 dark:ring-white/10">
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="text-sm font-semibold text-zinc-900 dark:text-white">{{ data_get($post, 'name') }}</h4>
                        <span class="inline-flex items-center rounded-md bg-zinc-100 px-2 py-1 text-xs font-medium text-zinc-600 dark:bg-zinc-700 dark:text-zinc-300">
                            {{ data_get($post, 'created_at') }}
                        </span>
                    </div>
                    <p class="text-zinc-600 dark:text-zinc-400">
                        {{ data_get($post, 'message') }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-8">
            <svg class="mx-auto h-12 w-12 text-zinc-400 dark:text-zinc-600 mb-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>
            <h3 class="text-sm font-medium text-zinc-900 dark:text-white">No entries yet</h3>
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400">Add one above to get started!</p>
        </div>
    @endif
</div>
