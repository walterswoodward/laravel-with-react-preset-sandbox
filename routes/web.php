<?php

use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

// Real Time Facades Rebuilt as RealTimeFacade
spl_autoload_register(function ($name) {
    // die($name);
    if (Str::startsWith($name, 'RealTimeFacade')) {
        $stub = file_get_contents(app_path('facade.stub'));

        $namespace = str_replace('/', '\\', dirname(str_replace('\\', '/', $name)));
        $className = class_basename($name);
        $accessor = str_replace('RealTimeFacade', '', $namespace) . '\\' . $className;

        $stub = str_replace(
            ['{namespace}', '{className}', '{accessor}'],
            [$namespace, $className, $accessor],
            $stub
        );

        // Save newly created {className}Facade class to app/
        file_put_contents($path = app_path($className.'Facade.php'), $stub);
        require $path;
    }
});

// Example #1: Payment Class Called Directly
Route::get('/testpaymentclass', function () {
    return (new \App\Payment())->process();
});

// Example #2: Basic Implementation of Laravel Real Time Facades
// see `storage/framework/cache/` for cached file
Route::get('/testrealtimefacades', function () {
    return Facades\App\Payment::process();
});

// Example #3: Uses the same underlying Payment class,
// but with the RealTimeFacade created in the call to
// spl_autoload_register above
Route::get('/testrealtimefacade', function () {
    return RealTimeFacade\App\Payment::process();
});

Route::get('/', function () {
    return view('index');
});

Route::get('videos', [VideosController::class, 'index']);
Route::get('videos/{video}', [VideosController::class, 'show']);
Route::post('videos', [VideosController::class, 'store']);
Route::put('videos/{video}', [VideosController::class, 'update']);
Route::delete('videos/{video}', [VideosController::class, 'delete']);
