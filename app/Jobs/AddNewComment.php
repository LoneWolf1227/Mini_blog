<?php

namespace App\Jobs;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddNewComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subject;
    protected $body;
    protected $postId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $body, $postId)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->postId = $postId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Comment::create([
            'subject' => $this->subject,
            'body' => $this->body,
            'post_id' => $this->postId
        ]);
    }
}
