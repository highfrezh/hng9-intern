<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hng9BioController;
use App\Http\Controllers\ArithemeticController;

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

//Create Bio data
Route::get('/create-bio', [Hng9BioController::class, 'createHngBio']);
//Return Bio Data
Route::get('/hng9-bio', [Hng9BioController::class, 'hngBio']);

//arithemetic Operation Route
Route::post('arithemetic', [ArithemeticController::class, 'arithemetic']);