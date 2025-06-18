<div>
    <form wire:submit="post" class="space-y-6">
        <flux:input 
            wire:model="name" 
            label="Name" 
            placeholder="Enter your name" 
            autofocus 
        />

        <flux:input 
            wire:model="message" 
            label="Message" 
            placeholder="Enter your message" 
        />

        <flux:button 
            type="submit" 
            variant="primary"
            wire:loading.attr="disabled"
            class="w-full"
        >
            Submit
        </flux:button>
    </form>
</div>
