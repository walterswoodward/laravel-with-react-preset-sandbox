<?php

use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;
use Facades\App\Payment as Payment;
use Illuminate\Support\Str;

// Basic Implementation of a Laravel Facade
// Route::get('/testfacade', function () {
//     return Payment::process();
// });

// Real Time Facades Rebuilt as RealTimeFacade
// spl_autoload_register(function ($name) {
//     // die($name);
//     if (Str::startsWith($name, 'RealTimeFacade')) {
//         $stub = file_get_contents(app_path('facade.stub'));

//         $namespace = str_replace('/', '\\', dirname(str_replace('\\', '/', $name)));
//         $className = class_basename($name);
//         $accessor = str_replace('RealTimeFacade', '', $namespace) . '\\' . $className;

//         $stub = str_replace(
//             ['{namespace}', '{className}', '{accessor}'],
//             [$namespace, $className, $accessor],
//             $stub
//         );

//         // Save newly created {className}Facade class to app/
//         file_put_contents($path = app_path($className.'Facade.php'), $stub);
//         require $path;
//     }
// });

Route::get('/testrealtimefacade', function () {
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
