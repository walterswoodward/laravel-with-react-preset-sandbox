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
        return response()->json(
            Video::create($request->getBody()),
            201
        );
    }

    public function update(Request $request, Video $video)
    {
        $video->update($request->getBody());
        return response()->json($video, 200);
    }

    public function delete(Video $video)
    {
        $video->delete();
        return response()->json(null, 204);
    }
}
