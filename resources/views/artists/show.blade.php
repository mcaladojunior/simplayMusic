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
                    <p>
                        <strong>Albums: </strong>
                        <ul>
                            @foreach($artist->albums as $album)
                                <li>{{ $album->album_name }}({{ $album->year }})</li>
                            @endforeach
                        </ul>
                    </p>
                    <p class="text-center">
                        <form class="form-inline" method="POST" action="{{ route('artists.destroy', $artist) }}">
                            @csrf

                            @method('DELETE')
                            <a class="btn btn-info mx-1" href="{{ url()->previous() }}">Back</a>
                            <a class="btn btn-warning mx-1" href="{{ route('artists.edit', $artist) }}">Edit</a>
                            <button class="btn btn-danger mx-1" type="submit">Delete</button>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
