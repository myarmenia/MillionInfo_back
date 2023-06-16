<?php

use App\Http\Controllers\API\Home\HomeController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\PressReleases\PressReleaseController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => 'auth:api'], function () {

// });

Route::apiResources([

    // 'press-releases' => PressReleaseController::class,

]);

Route::get('languages', [LanguageController::class, 'index']);
Route::get('home', [HomeController::class, 'index']);



