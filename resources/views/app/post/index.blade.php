@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        @foreach($posts as $post)
            <div class="col-4 pb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->getBodyPreview()}}</p>
                        <p>{{$post->createdAtForHumans()}}</p>
                        <div class="mt-4">
                            Теги:
                            @foreach ($post->tags as $tag)
                                <a href=" {{ route('post.tag', $tag->id) }}" class="badge bg-danger">{{$tag->label}}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mx-auto">{{$posts->links()}}</div>
@endsection
