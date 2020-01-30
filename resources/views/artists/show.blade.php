@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header"><h3 class="text-center">{{ __('Artist') }}</h3></div>
                <div class="card-body">
                    <p><strong>ID: </strong>{{ $artist->id }}</p>
                    <p><strong>Artist name: </strong>{{ $artist->artist_name }}</p>
                    <p><strong>Twitter handle: </strong>{{ $artist->twitter_handle }}</p>
                    <p><strong>Albums: </strong>{{ $artist->albums }}</p>
                    <p class="text-center">
                        <a class="btn btn-info" href="{{ route('artists.show', $artist) }}">Show</a>
                        <a class="btn btn-warning" href="{{ route('artists.edit', $artist) }}">Edit</a>
                        <form class="form-inline" method="POST" action="{{ route('artists.destroy', $artist) }}">
                            @csrf

                            @method('DELETE')

                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
