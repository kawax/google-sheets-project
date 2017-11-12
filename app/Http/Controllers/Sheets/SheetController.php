<?php

namespace App\Http\Controllers\Sheets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Sheets;
use Google;

class SheetController extends Controller
{
    public function __invoke(Request $request, $spreadsheet_id, $sheet_id)
    {
        $token = $request->user()->access_token;

        Google::setAccessToken($token);

        Sheets::setService(Google::make('sheets'));

        $rows = Sheets::spreadsheet($spreadsheet_id)->sheet($sheet_id)->get();

        $headers = $rows->pull(0);

        return view('sheets.sheet')->with(compact('headers', 'rows'));
    }
}
