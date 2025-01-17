<?php

// database/seeders/VideoSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run()
    {
        Video::factory()->count(5)->create([
            'url' => 'http://example.com/default', // Ensure the url field is provided
        ]);
    }
}