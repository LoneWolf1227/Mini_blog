<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateRequest;
use App\Jobs\AddNewComment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateRequest $request): RedirectResponse
    {
        AddNewComment::dispatch($request['subject'], $request['body'], $request['postId']);

        return back()->with('success', 'Comment added successfully.');
    }
}
