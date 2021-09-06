<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::lastLimit(6);
        return view('app.home', compact('posts'));
    }
}
