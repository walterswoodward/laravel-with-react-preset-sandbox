<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            User::factory()->create();
            Video::factory()->create();
            Post::factory(5)->create([ // 5 Posts for each user
                'user_id' => $i,
            ]);
            Profile::factory()->create([ // 1 profile for each user
                'user_id' => $i
            ]);
            Experience::factory()->create([ // 1 experience for each user
                'user_id' => $i
            ]);
        }
    }
}
