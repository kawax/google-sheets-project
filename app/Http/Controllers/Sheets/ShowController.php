<?php

namespace App\Http\Controllers\Sheets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Sheets;
use Google;

class ShowController extends Controller
{
    public function __invoke(Request $request, $spreadsheet_id)
    {
        $token = $request->user()->access_token;

        Google::setAccessToken($token);

        $sheets = Sheets::setService(Google::make('sheets'))
                        ->spreadsheet($spreadsheet_id)
                        ->sheetList();

        return view('sheets.show')->with(compact('spreadsheet_id', 'sheets'));
    }
}
