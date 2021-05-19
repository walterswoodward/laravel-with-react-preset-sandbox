<?php

use App\Http\Controllers\VideosController;
use App\Models\Video;
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

// === Laravel Explained, Episode 2, Explain Real-time Facades From the Inside-Out ===
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

// === Laravel Explained, Episode 3, Explain PHP Generators ===
// Example #1 - Iterating with range()
Route::get('/exhaustmemory', function () {
    $items = range(1, 10000000);
    return 'Done';
});

// Example #2 - Generator
// customRange :: (int, int) -> Generator
function customRange($begin, $end) {
    for ($i = $begin; $i <= $end; $i++) {
        yield $i;
    }
}

function IsPrime($n)
{
    for ($x = 2; $x < $n; $x++) {
        if ($n % $x == 0) {
            return 0;
        }
    }
    return 1;
}

Route::get('/generator', function() {
    foreach(dump(customRange(1, 10000000)) as $i) {
        if ($i < 1000 && isPrime($i)) {
            dump($i);
        }
    };
    return 'Done';
});

// Example #3: Iterating Over Generator
// make :: int -> Generator
function make($times) {
    for ($i = 0; $i < $times; $i++) {
        yield Video::factory()->create();
    }
}

Route::get('/generatevideos', function () {
    $videos = make(1000000); // Can change this to 1000000 w/o hitting memory limit
    // $videos->current();
    // $videos->next();
    // $videos->current();
    foreach($videos as $video) {
        dump($video);
    }
    return 'Done';
});

// Example 4: LazyCollections:
Route::get('/lazycollections', function () {
    // Cursor creates an instance of LazyCollections
    $videos = Video::cursor()->filter(function ($video) {
        return $video->id;
    });

    foreach ($videos as $video) {
        dump($video);
    }
    return 'Done';
});

Route::get('/', function () {
    return view('index');
});

Route::get('videos', [VideosController::class, 'index']);
Route::get('videos/{video}', [VideosController::class, 'show']);
Route::post('videos', [VideosController::class, 'store']);
Route::put('videos/{video}', [VideosController::class, 'update']);
Route::delete('videos/{video}', [VideosController::class, 'delete']);
