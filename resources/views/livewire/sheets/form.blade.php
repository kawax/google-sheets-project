<div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Add New Entry</h3>
    
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="space-y-4">
        <div>
            <x-label for="name" :value="__('Name')" />
            <x-input 
                id="name" 
                class="block mt-1 w-full" 
                type="text" 
                name="name" 
                wire:model="name" 
                autofocus 
                placeholder="Enter your name"
            />
            @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <x-label for="message" :value="__('Message')" />
            <x-input 
                id="message" 
                class="block mt-1 w-full" 
                type="text" 
                name="message" 
                wire:model="message" 
                placeholder="Enter your message"
            />
            @error('message') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <x-button 
                wire:click="post" 
                wire:loading.attr="disabled"
                class="w-full sm:w-auto"
            >
                <span wire:loading.remove>{{ __('Submit') }}</span>
                <span wire:loading>{{ __('Submitting...') }}</span>
            </x-button>
        </div>
    </div>
</div>
