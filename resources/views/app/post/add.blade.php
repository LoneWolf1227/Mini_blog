@extends('layouts.app')

@section('content')
    <div class="row mt-5">
            <div class="col-10 pb-3">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h4>Add posts</h4>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif
                        <form method="POST" action="{{ route('post.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Title : <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Body : <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="body"></textarea>
                                @if ($errors->has('body'))
                                    <span class="text-danger">{{ $errors->first('body') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tags : <span class="text-danger">*</span></label>
                                <br>
                                <input type="text" data-role="tagsinput" name="tags" class="form-control tags">
                                <br>
                                @if ($errors->has('tags'))
                                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success store-data btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
