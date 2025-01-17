<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use function App\Helpers\create_default_video;

class VideosController extends Controller
{
    public function show($id = null)
    {
        if (!$id) {
            $videoData = create_default_video();
        } else {
            $video = Video::findOrFail($id);
            $videoData = create_default_video(); // Use default video data
        }

        return view('videos.show', ['video' => $videoData]);
    }
}