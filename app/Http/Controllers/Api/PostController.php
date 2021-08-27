<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allByTag(Tag $tag)
    {
        $posts = $tag->posts()->findByTag(5);
        return new PostResource($posts);
    }
}
