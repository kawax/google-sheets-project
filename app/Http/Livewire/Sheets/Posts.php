<?php

namespace App\Http\Livewire\Sheets;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Revolution\Google\Sheets\Facades\Sheets;

class Posts extends Component
{
    protected $listeners = ['postAdded' => 'render'];

    public function getPostsProperty(): Collection
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

    public function render(): View
    {
        return view('livewire.sheets.posts');
    }
}
