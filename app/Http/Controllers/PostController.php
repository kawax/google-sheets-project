<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Revolution\Google\Sheets\Facades\Sheets;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  PostRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PostRequest $request)
    {
        $append = [
            $request->input('name'),
            $request->input('message'),
            now()->toDateTimeString(),
        ];

        Sheets::spreadsheet(config('sheets.post_spreadsheet_id'))
              ->sheet(config('sheets.post_sheet_id'))
              ->range('')
              ->append([$append]);

        return back();
    }
}
