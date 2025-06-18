<?php

namespace App\Livewire\Sheets;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Revolution\Google\Sheets\Facades\Sheets;

class Form extends Component
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $message = '';

    public bool $submitting = false;

    public function post(): void
    {
        $this->submitting = true;
        
        $this->validate();

        $append = [
            $this->name,
            $this->message,
            now()->toDateTimeString(),
        ];

        Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))
            ->sheet(config('sheets.post_sheet_id'))
            ->append([$append]);

        $this->reset('name', 'message');
        $this->submitting = false;

        $this->dispatch('postAdded');
    }
}
