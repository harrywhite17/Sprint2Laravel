<?php

namespace Tests\Unit;

use App\Models\Video;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_formatted_published_at_date()
    {
        $video = Video::factory()->create([
            'title' => 'Fugit quam consequatur mollitia sed quibusdam est inventore.',
            'url' => 'http://example.com/video3',
            'is_default' => false,
            'published_at' => '2023-05-15 12:00:00',
        ]);
        $this->assertEquals('15 de May de 2023', $video->formatted_published_at);
    }

    public function test_can_get_formatted_published_at_date_when_not_published()
    {
        $video = Video::factory()->create([
            'title' => 'Sunt ipsam labore ipsam.',
            'url' => 'http://example.com/video4',
            'is_default' => false,
            'published_at' => null,
        ]);
        $this->assertNull($video->formatted_published_at);
    }

    public function testCanGetFormattedVideo()
    {
        $video = \App\Models\Video::create([
            'title' => 'Adipisci magnam numquam nesciunt quo repellat.',
            'url' => 'http://example.com/video5',
            'is_default' => false,
            'published_at' => '2023-05-15 12:00:00',
        ]);
        $this->assertEquals('Adipisci magnam numquam nesciunt quo repellat.', $video->title);
    }

    public function testAnotherVideoTest()
    {
        $video = \App\Models\Video::create([
            'title' => 'Est beatae laudantium ea totam maxime.',
            'url' => 'http://example.com/video6',
            'is_default' => false,
            'published_at' => now(),
        ]);
        $this->assertEquals('Est beatae laudantium ea totam maxime.', $video->title);
    }
}