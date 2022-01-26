@extends('pages.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <h1 class="display-4">Welcome to Contacts Page</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti consequatur a omnis totam aperiam assumenda nostrum minus aliquid fugit enim quibusdam quis, eligendi aut quod culpa officia voluptas quos sapiente?</p>

            <div class="row">
                @foreach ($contacts as $contact)
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $contact['name'] }}</h3>
                            <small>{{ $contact['email'] }}</small>
                            <small>{{ $contact['contact_no'] }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection