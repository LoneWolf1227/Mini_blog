<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\State;
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

        $posts = Post::factory(20)->create();

        $tagsId = $tags->pluck('id');

        $posts->each(function ($post) use ($tagsId){
            $post->tags()->attach($tagsId->random(3));
            Comment::factory(3)->create(['post_id' => $post->id]);
            State::factory(1)->create(['post_id' => $post->id]);
        });

    }
}
