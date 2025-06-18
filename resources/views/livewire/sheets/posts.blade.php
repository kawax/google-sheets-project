<div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Entries</h3>
    
    @if($this->posts->count() > 0)
        <div class="space-y-4">
            @foreach($this->posts as $post)
                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="font-semibold text-gray-900">{{ data_get($post, 'name') }}</h4>
                        <span class="text-xs text-gray-500">
                            {{ data_get($post, 'created_at') }}
                        </span>
                    </div>
                    <p class="text-gray-700">
                        {{ data_get($post, 'message') }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-8">
            <div class="text-gray-400 mb-2">
                <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <p class="text-gray-500">No entries yet. Add one above to get started!</p>
        </div>
    @endif
</div>
