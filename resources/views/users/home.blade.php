@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="storage/avatars/{{ Auth::user()->avatar }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                  <p class="card-text">{{ Auth::user()->bio }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="display-4">Welcome {{Auth::user()->first_name }} {{Auth::user()->last_name}}</h1>

                    @if (count($posts) > 0)
                        <div class="row">
                            @foreach ($posts as $post)
                            <div class="col-4">
                                <div class="card mt-2">
                                    <div class="card-body">
                                        <h3 class="card-title">{{$post->title}}</h3>
                                        <p class="lead">
                                            {{ $post->body }}
                                        </p>
                                        <small>Posted by {{ $post->user->first_name }} {{ $post->user->last_name }} on {{ $post->created_at }}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p>This user doesn't have any post.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
