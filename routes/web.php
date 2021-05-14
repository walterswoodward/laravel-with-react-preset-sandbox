<?php

use App\Http\Controllers\VideosController;
use App\Models\Video;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/**
** Routes for a RESTful service:
**
** Route::get($uri, $action);
** Route::post($uri, $action);
** Route::put($uri, $action);
** Route::delete($uri, $action);
**
**/

Route::get('videos', [VideosController::class, 'index']);
Route::get('videos/{video}', [VideosController::class, 'show']);
Route::post('videos', [VideosController::class, 'store']);
Route::put('videos/{video}', [VideosController::class, 'update']);
Route::delete('videos/{video}', [VideosController::class, 'delete']);
