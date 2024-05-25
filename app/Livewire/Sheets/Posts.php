<?php

namespace App\Livewire\Sheets;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Revolution\Google\Sheets\Facades\Sheets;

class Posts extends Component
{
    #[Computed]
    public function posts(): Collection
    {
        $sheets = Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))
            ->sheet(config('sheets.post_sheet_id'))
            ->get();

        $header = [
            'name',
            'message',
            'created_at',
        ];

        $posts = Sheets::collection(header: $header, rows: $sheets);

        return $posts->reverse()->take(10);
    }

    #[On('postAdded')]
    public function render(): View
    {
        return view('livewire.sheets.posts');
    }
}
