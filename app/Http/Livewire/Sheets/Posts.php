<?php

namespace App\Http\Livewire\Sheets;

use Livewire\Component;
use Revolution\Google\Sheets\Facades\Sheets;

class Posts extends Component
{
    protected $listeners = ['postAdded' => 'render'];

    public function getPostsProperty()
    {
        $sheets = Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))
                        ->sheet(config('sheets.post_sheet_id'))
                        ->get();

        $header = [
            'name',
            'message',
            'created_at',
        ];

        $posts = Sheets::collection($header, $sheets);

        return $posts->reverse()->take(10);
    }

    public function render()
    {
        return view('livewire.sheets.posts');
    }
}
