@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header"><h3 class="text-center">{{ __('New Album') }}</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('albums.store') }}">
                        @csrf

                        @method('POST')

                        <div class="form-group">
                            <label for="album_name">Name</label>
                            <input name="album_name" type="text" class="form-control @error('album_name') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="year">Year</label>
                            <input name="year" type="numeric" min="1900" max="2020" value="2020" class="form-control @error('year') is-invalid @enderror">
                        </div>

                        <div class="form-group">
                            <label for="artist_id">Artist</label>
                            <select name="artist_id" class="form-control @error('artist_id') is-invalid @enderror">
                                @foreach($artists as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->artist_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-center">
                            <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
