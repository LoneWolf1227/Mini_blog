@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        @foreach($posts as $post)
            <div class="col-6 pb-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{$post->title}}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$post->getBodyPreview()}}</p>
                        <p>{{$post->publishedAtForHumans()}}</p>
                        <div class="mt-4">
                            Теги:
                            @foreach ($post->tags as $tag)
                                <a href=" {{ route('posts.tag', $tag->id) }}" class="badge bg-info">{{$tag->label}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="badge bg-primary">{{$post->state->likes}} <i class="far fa-thumbs-up"></i></span>
                        <span class="badge bg-info">{{$post->state->views}} <i class="far fa-eye"></i></span>
                        <span><a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">More</a></span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
