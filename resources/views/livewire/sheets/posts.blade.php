<div>
    @if($this->posts->count() > 0)
        <div class="space-y-4">
            @foreach($this->posts as $post)
                <flux:card>
                    <flux:card.body>
                        <div class="flex justify-between items-start mb-2">
                            <flux:heading size="sm">{{ data_get($post, 'name') }}</flux:heading>
                            <flux:badge variant="outline" size="sm">
                                {{ data_get($post, 'created_at') }}
                            </flux:badge>
                        </div>
                        <p class="text-zinc-600 dark:text-zinc-400">
                            {{ data_get($post, 'message') }}
                        </p>
                    </flux:card.body>
                </flux:card>
            @endforeach
        </div>
    @else
        <div class="text-center py-8">
            <flux:icon.document-text class="mx-auto size-12 text-zinc-400 dark:text-zinc-600 mb-4" />
            <flux:subheading>No entries yet</flux:subheading>
            <p class="text-zinc-500 dark:text-zinc-400">Add one above to get started!</p>
        </div>
    @endif
</div>
