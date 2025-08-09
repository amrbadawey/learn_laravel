<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ClubController;
use App\Http\Controllers\Api\V1\StadiumController;
use App\Http\Controllers\Api\V1\ReservationController;

Route::prefix('v1')->group(function () {
    // Authentication
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        // Clubs
        Route::apiResource('clubs', ClubController::class);

        // Stadiums
        Route::apiResource('stadiums', StadiumController::class);
        Route::get('sport-types/{sportType}/stadiums', [StadiumController::class, 'indexBySportType']);


        // Reservations
        Route::apiResource('reservations', ReservationController::class)->except(['update']);
        Route::post('reservations/{reservation}/cancel', [ReservationController::class, 'cancel']);
        Route::get('stadiums/{stadium}/availability', [ReservationController::class, 'checkAvailability']);
    });
});
