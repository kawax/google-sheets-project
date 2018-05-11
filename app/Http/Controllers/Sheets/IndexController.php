<?php

namespace App\Http\Controllers\Sheets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Revolution\Google\Sheets\Facades\Sheets;
use PulkitJalan\Google\Facades\Google;

/**
 * 1. spreadsheetList
 */
class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        // Facade
        //        $token = $request->user()->access_token;
        //
        //        Google::setAccessToken($token);
        //
        //        $spreadsheets = Sheets::setService(Google::make('sheets'))
        //                              ->setDriveService(Google::make('drive'))
        //                              ->spreadsheetList();

        // GoogleSheets Trait
        $spreadsheets = $request->user()
                                ->sheets()
                                ->spreadsheetList();

        return view('sheets.index')->with(compact('spreadsheets'));
    }
}
