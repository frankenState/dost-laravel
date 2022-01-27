@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">

            @if (session('status'))
                <div class="alert alert-{{ session('status')['type'] }}">
                    <small>{{ session('status')['message'] }}</small>
                </div>
            @endif

            <form action="{{ route('posts.search') }}" method="GET">
                <div class="input-group mb-3">
                    <input name="key" type="text" class="form-control" placeholder="Search Key" aria-label="Search Key" aria-describedby="Search Key" value={{ old('key') }}>
                    <button type="submit" class="btn btn-outline-dark" type="button" id="Search Key">Search</button>
                </div>
            </form>

            <h2 class="display-4">Welcome to Posts Page</h2>

            @if (count($posts) > 0)
                @foreach ($posts as $post)
                <div class="card mb-2">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <p class="lead">{{ $post->body }}</p>
                        <small>Posted by {{ $post->user->first_name }} {{ $post->user->last_name }} on {{ date_format(date_create($post->created_at), "M d, Y H:i") }}</small>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group">
                            <a href="{{ route('posts.show', [ 'id' => $post->id ]) }}" class="btn btn-outline-dark btn-sm">View</a>
                        @if (Auth::user()->id == $post->user_id)
                            <a href="{{ route('posts.edit', [ 'id' => $post->id ]) }}" class="btn btn-outline-dark btn-sm">Edit</a>
                            <a href="{{ route('posts.delete', ['id' => $post->id ]) }}" class="btn btn-outline-dark btn-sm">Delete</a>
                        @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>No post found.</p>
            @endif
        </div>
    </div>
</div>
@endsection