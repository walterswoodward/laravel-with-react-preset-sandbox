<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

/**
** Basic Routes for a RESTful service:
**
** Route::get($uri, $callback);
** Route::post($uri, $callback);
** Route::put($uri, $callback);
** Route::delete($uri, $callback);
**
**/

Route::get('videos', function () {
    return response(['Video 1', 'Video 2', 'Video 3'],200);
});

Route::get('videos/{videoId}', function ($videoId) {
    return response()->json(['videoId' => "{$videoId}"], 200);
});


Route::post('videos', function() {
    return  response()->json([
            'message' => 'Create success'
        ], 201);
});

Route::put('videos/{video}', function() {
    return  response()->json([
            'message' => 'Update success'
        ], 200);
});

Route::delete('videos/{video}',function() {
    return  response()->json(null, 204);
});
