@extends('pages.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <h1>Test Laravel!</h1>
    

            <a href="{{ route('greeting') }}">The Greeting</a><br/>
            <a href="{{ route('userWithId', ['id' => 10]) }}">User With ID</a><br/>
            <a href="{{ route('postcommentuser', ['comment' => 10, 'user' => 3]) }}">Post Comment User</a><br/>
            
            <h1>Hello {{ $name }}</h1>
        
            @if (count($names) === 1)
                <p>{{ $names[0] }}</p>
            @elseif (count($names) > 1)
                <ul>
                    @foreach ($names as $name)
                        <li>{{ $name }}</li>
                    @endforeach
                </ul>
            @else
                <p>names variable is empty.</p>
            @endif
        </div>
    </div>
</div>
@endsection