@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="display-4">Are you sure?</h3>

                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a href="{{ route('posts.index') }}" class="btn btn-primary">Cancel</a>
                            <a href="{{ route('posts.destroy', ['id' => $post->id]) }}" class="btn btn-danger">Yes</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection