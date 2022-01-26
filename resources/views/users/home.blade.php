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
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, magni voluptatem quod dicta voluptatum eos dolorum est a ab repellat. Illum qui, facere eaque quae vero praesentium vel deleniti molestias?</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
