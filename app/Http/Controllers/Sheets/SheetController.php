<?php

namespace App\Http\Controllers\Sheets;

use App\Http\Controllers\Controller;
use Google;
use Illuminate\Http\Request;
use Sheets;

/**
 * 3. sheet.
 */
class SheetController extends Controller
{
    public function __invoke(Request $request, $spreadsheet_id, $sheet_id)
    {
        // Facade
        //        $token = $request->user()->access_token;
        //
        //        Google::setAccessToken($token);
        //
        //        $rows = Sheets::setService(Google::make('sheets'))
        //                      ->spreadsheet($spreadsheet_id)
        //                      ->sheet($sheet_id)
        //                      ->get();

        // GoogleSheets Trait
        $rows = $request->user()
                        ->sheets()
                        ->spreadsheet($spreadsheet_id)
                        ->sheet($sheet_id)
                        ->get();

        $headers = $rows->pull(0);

        return view('sheets.sheet')->with(compact('headers', 'rows'));
    }
}
