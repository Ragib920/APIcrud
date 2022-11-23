<?php

use App\Http\Controllers\APIcrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('company_list', [APIcrudController::class, 'CompanyListView']);
Route::get('active_company_list', [APIcrudController::class, 'ActiveCompanyListView']);
