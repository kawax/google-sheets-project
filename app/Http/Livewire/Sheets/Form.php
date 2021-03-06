<?php

namespace App\Http\Livewire\Sheets;

use Livewire\Component;
use Revolution\Google\Sheets\Facades\Sheets;

class Form extends Component
{
    public string $name = '';

    public string $message = '';

    protected $rules = [
        'name'    => 'required',
        'message' => 'required',
    ];

    public function post()
    {
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

        $this->emit('postAdded');
    }

    public function render()
    {
        return view('livewire.sheets.form');
    }
}
