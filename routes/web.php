<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\ClubController;
use App\Http\Controllers\Web\StadiumController;
use App\Http\Controllers\Web\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('clubs', ClubController::class);
    Route::resource('stadiums', StadiumController::class);
    Route::resource('reservations', ReservationController::class)->only(['index', 'show', 'destroy']);
});

// For a real application, you would have authentication routes defined here.
// For example, if you are using Laravel Breeze or Jetstream, you would have:
// require __DIR__.'/auth.php';
//
// Since this is a blueprint, we will assume auth routes are set up.
// You can typically install a starter kit to get these routes.
// For example: `composer require laravel/breeze --dev` then `php artisan breeze:install`
