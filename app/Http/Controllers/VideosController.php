<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        return Video::all();
    }

    public function show(Video $video)
    {
        return $video;
    }

    public function store(Request $request)
    {
        // https://laravel.com/docs/8.x/validation#available-validation-rules
        $this->validate($request, [
            'title' => 'required|unique:videos|max:255',
            'description' => 'required',
            'director' => 'string',
            'rating' => 'string',
            'price' => 'integer',
            'availability' => 'boolean'
        ]);

        $video = Video::create($request->all());

        return response()->json(
            $video,
            201
        );
    }

    public function update(Request $request, Video $video)
    {
        $video->update($request->all());
        return response()->json($video, 200);
    }

    public function delete(Video $video)
    {
        $video->delete();
        return response()->json(null, 204);
    }
}
