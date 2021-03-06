<div>
    <div class="mt-3">
        <x-label for="name" :value="__('Name')"/>

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" autofocus/>
    </div>

    <div class="mt-3">
        <x-label for="message" :value="__('Message')"/>

        <x-input id="message" class="block mt-1 w-full" type="text" name="message" wire:model="message"/>
    </div>

    <div class="mt-3">
        <x-button wire:click="post" wire:loading.attr="disabled">
            {{ __('Submit') }}
        </x-button>
    </div>

    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

</div>
