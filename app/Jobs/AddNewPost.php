<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class AddNewPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $title;
    protected string $body;
    protected string $tags;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title, $body, $tags)
    {
        $this->title = $title;
        $this->body = $body;
        $this->tags = $tags;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tagsId = Tag::FindByLabelOrCreateNew($this->tags);
        $post = new Post();
        $post->title = $this->title;
        $post->slug = Str::slug($this->title, '-', 'en');
        $post->body = $this->body;
        $post->save();
        $post->tags()->attach($tagsId);
    }
}
