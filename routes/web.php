<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class);
Route::post('post', PostController::class)->name('post.store');

//Route::name('login')->get('login', 'LoginController@redirect');
//Route::get('callback', 'LoginController@callback');
//Route::name('logout')->post('logout', 'LoginController@logout');
//
//Route::middleware('auth')->prefix('home')->namespace('Sheets')->group(function () {
//    Route::name('sheets.index')->get('/', 'IndexController');
//    Route::name('sheets.show')->get('/{spreadsheet_id}', 'ShowController');
//    Route::name('sheets.sheet')->get('/{spreadsheet_id}/sheet/{sheet_id}', 'SheetController');
//});
