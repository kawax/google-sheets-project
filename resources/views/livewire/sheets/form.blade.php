<div>
    @if ($errors->any())
        <flux:banner variant="danger" class="mb-4">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </flux:banner>
    @endif

    <form wire:submit="post" class="space-y-4">
        <flux:field>
            <flux:label>Name</flux:label>
            <flux:input 
                wire:model="name" 
                placeholder="Enter your name"
                autofocus 
            />
            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>Message</flux:label>
            <flux:input 
                wire:model="message" 
                placeholder="Enter your message"
            />
            <flux:error name="message" />
        </flux:field>

        <div>
            <flux:button 
                type="submit" 
                variant="primary"
                loading="submitting"
            >
                Submit
            </flux:button>
        </div>
    </form>
</div>
