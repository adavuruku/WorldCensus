<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Country;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\UserController;
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

Artisan::call('route:cache');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/{id}', function ($id) {
    // Only executed if {id} is numeric...
    return $id;
});
// Route::get('country', 'Country\CountryController@country');
Route::get('country', [CountryController::class, 'country']);
Route::get('country/co', [CountryController::class, 'country']);


Route::get('/user/wel/{id}', [UserController::class, 'show']);


//# ROUTE GROUP