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

            <h2 class="display-4">{{ $post->title }}</h2>
            <small>Posted by {{ $post->user->first_name }} {{ $post->user->last_name }} on {{ date_format(date_create($post->created_at), "M d, Y H:i") }}</small>
            <p class="lead">{{ $post->body }}</p>
            <hr/>
            @if (Auth::user()->id == $post->user_id)
            <div class="btn-group">
                <a href="{{ route('posts.edit', ['id' => $post->id ]) }}" class="btn btn-outline-dark btn-sm">Edit</a>
                <a href="{{ route('posts.delete', ['id' => $post->id ]) }}" class="btn btn-outline-dark btn-sm">Delete</a>
            </div>
            @endif
            
        </div>
    </div>
</div>
@endsection