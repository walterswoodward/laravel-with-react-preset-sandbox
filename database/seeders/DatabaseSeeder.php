<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Experience;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Profile;
use App\Models\Tag;
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
            Post::factory(5)->create([ // 5 posts for each user
                'user_id' => $i,
            ]);
            Comment::factory(5)->create([ // 5 comments for each post
                'user_id' => $i,
                'post_id' => $i,
            ]);
            Profile::factory()->create([ // 1 profile for each user
                'user_id' => $i
            ]);
            Experience::factory()->create([ // 1 experience for each user
                'user_id' => $i
            ]);
        }

        $enums = ['personal', 'family', 'work', 'vacation'];

        foreach($enums as $enum) {
            Tag::factory()->create([
                'name' => $enum
            ]);
        }

        for($tag_id = 1; $tag_id <= 4; $tag_id++) {
            for($post_id = 1; $post_id <= 50; $post_id++) {
                if (rand(0, 1) < 0.5) {
                    PostTag::factory()->create([
                        'post_id' => $post_id,
                        'tag_id' => $tag_id
                    ]);
                }
            }
        }

    }
}
