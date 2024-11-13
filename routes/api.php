<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PublicController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Api\ApiClientPublicController;

  // to handle session in apis
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
  /// end ////

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|get_client_mobile
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/verify_client_credentials', [ApiClientPublicController::class, 'verify_client_credentials']);
Route::post('/client_agreement', [ApiClientPublicController::class, 'client_agreement']);
//Route::post('/get_client_mobile', [ApiClientPublicController::class, 'get_client_mobile']);

Route::get('/get_profile',[ApiController::class, "all_details"]);
Route::get('/get_profile1/{id}', [ApiController::class, 'total_details']);
Route::post('/login', [ApiController::class, 'login']);


Route::middleware([
    'api',
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    StartSession::class,
])->group(function () {
    Route::post('/get_client_mobile', [ApiClientPublicController::class, 'get_client_mobile']);
});






