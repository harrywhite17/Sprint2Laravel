<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Helpers\UserHelpers;
use App\Helpers\VideoHelpers;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->call(VideoSeeder::class); // Call the VideoSeeder

        User::factory()->withPersonalTeam()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $userHelpers = new UserHelpers();
        $userHelpers->create_default_user();

        $videoHelpers = new VideoHelpers();
        $videoHelpers->create_default_video();
    }
}