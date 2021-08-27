<?php

namespace App\Http\Controllers;

use App\Jobs\AddNewPost;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

use App\Http\Requests\Post\CreateRequest;

class PostController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::allPaginate(5);
        return view('app.post.index', compact('posts'));
    }

    public function allByTag(Tag $tag)
    {
        $posts = $tag->posts()->findByTag(5);
        return view('app.post.byTag', compact('posts'));
    }

    public function add()
    {
        return view('app.post.add');
    }

    public function store(CreateRequest $request)
    {
        AddNewPost::dispatch($request['title'], $request['body'], $request['tags']);

        return back()->with('success', 'Пост создан успешно.');
    }

}
