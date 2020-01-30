@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header"><h3 class="text-center">{{ __('Album') }}</h3></div>
                <div class="card-body">
                    <p><strong>ID: </strong>{{ $album->id }}</p>
                    <p><strong>Album name: </strong>{{ $album->album_name }}</p>
                    <p><strong>Year: </strong>{{ $album->year }}</p>
                    <p><strong>Artist: </strong>{{ $album->artist_name }}</p>
                    <div class="row justify-content-center">
                        <form class="form-inline" method="POST" action="{{ route('albums.destroy', $album) }}">
                            @csrf

                            @method('DELETE')
                            <a class="btn btn-info mx-1" href="{{ url()->previous() }}">Back</a>
                            <a class="btn btn-warning mx-1" href="{{ route('albums.edit', $album) }}">Edit</a>
                            <button class="btn btn-danger mx-1" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
