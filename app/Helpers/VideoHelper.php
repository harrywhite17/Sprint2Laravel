<?php

namespace App\Helpers;

use App\Models\Video;

function create_custom_video(Video $video)
{
    return [
        'title' => $video->title,
        'description' => $video->description,
        'url' => 'https://www.youtube.com/embed/l9zrSobASSs?si=Jjy-upKwtA61F7am',
        'published_at' => now(),
        'previous' => $video->previous,
        'next' => $video->next,
        'series_id' => $video->series_id,
        'is_default' => $video->is_default,
        'embed_url' => 'https://www.youtube.com/embed/l9zrSobASSs?si=Jjy-upKwtA61F7am', // Add this line
    ];
}

function create_default_video()
{
    $video = Video::create([
        'title' => 'Default Title',
        'description' => 'Default Description',
        'url' => 'https://default.url',
        'published_at' => now(),
        'previous' => null,
        'next' => null,
        'series_id' => null,
        'is_default' => true,
    ]);

    return create_custom_video($video);
}