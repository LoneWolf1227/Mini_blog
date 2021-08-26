<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
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
        // \App\Models\User::factory(10)->create();
        $tags = Tag::factory(10)->create();

        $posts = Post::factory(10)->create();

        $tagsId = $tags->pluck('id');

        $posts->each(function ($post) use ($tagsId){
            $post->tags()->attach($tagsId->random(3));
        });

    }
}
