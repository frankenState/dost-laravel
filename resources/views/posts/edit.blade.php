@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <h2 class="display-4">Editing a Post</h2>

            @if (session('status'))
                <div class="alert alert-{{ session('status')['type'] }}">
                    <small>{{ session('status')['message'] }}</small>
                </div>
            @endif

            <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="{{ $post->title }}" />
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea placeholder="Post body" name="body" class="form-control @error('body') is-invalid @enderror" id="body" rows="3">{{ $post->body }}</textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-primary">Save</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection