<?php

use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;
use App\PaymentFacade as Payment;

// Basic Implementation of a Laravel Facade
Route::get('/testfacade', function () {
    return Payment::process();
});

Route::get('/', function () {
    return view('index');
});

Route::get('videos', [VideosController::class, 'index']);
Route::get('videos/{video}', [VideosController::class, 'show']);
Route::post('videos', [VideosController::class, 'store']);
Route::put('videos/{video}', [VideosController::class, 'update']);
Route::delete('videos/{video}', [VideosController::class, 'delete']);


