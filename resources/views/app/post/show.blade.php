@extends('layouts.app')
@section('content')

    <div class="row mt-2">
        <div class="col-12 p-3">
            <h5 class="mt-2">{{$post->title}}</h5>
            <p>
                @foreach ($post->tags as $tag)
                    <a href=" {{ route('posts.tag', $tag->id) }}" class="badge bg-info">{{$tag->label}}</a>
                @endforeach
            </p>
            <p class="card-text">{{$post->body}}</p>
            <p>Published:  <i>{{$post->publishedAtForHumans()}}</i></p>
            <div class="mt-3">
                <span class="badge bg-primary">{{$post->state->likes}} <i class="far fa-thumbs-up"></i></span>
                <span class="badge bg-info">{{$post->state->views}} <i class="far fa-eye"></i></span>
            </div>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="{{ route('comment.store') }}">
            @csrf
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
                @if ($errors->has('subject'))
                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Comment</label>
                <textarea class="form-control" id="body" rows="3" name="body"></textarea>
                @if ($errors->has('body'))
                    <span class="text-danger">{{ $errors->first('body') }}</span>
                @endif
            </div>
            <input type="hidden" id="postId" name="postId" value="{{$post->id}}">
            <button class="btn btn-success" type="submit">Send</button>
        </form>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif
        @foreach($post->comments as $comment)
            <div class="toast-container pb-2 mt-5 mx-auto" style="min-width: 100%;">
                <div class="toast showing" style="min-width: 100%;">
                    <div class="toast-header">
                        <img src="https://via.placeholder.com/50/5F113B/FFFFFF/?text=User" class="rounded me-2" alt="...">
                        <strong class="me-auto">{{$comment->subject}}</strong>
                        <small class="text-muted">{{$comment->createdAtForHumans()}}</small>
                    </div>
                    <div class="toast-body">
                        {{$comment->body}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
