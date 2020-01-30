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
                <div class="card-header"><h3 class="text-center">{{ __('Edit Artist') }}</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('artists.update', ['id' => $artist->id]) }}">
                        @csrf

                        @method('PUT')

                        <div class="form-group">
                            <label for="artist_name">Name</label>
                            <input name="artist_name" type="text" class="form-control @error('artist_name') is-invalid @enderror" value="{{ $artist->artist_name }}">
                        </div>

                        <div class="form-group">
                            <label for="twitter_handle">Twitter handle</label>
                            <input name="twitter_handle" type="text" class="form-control @error('twitter_handle') is-invalid @enderror" value="{{ $artist->twitter_handle }}">
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
