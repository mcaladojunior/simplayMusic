@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">{{ __('Artists') }}</h3>
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>        
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('artists.create') }}" class="btn btn-primary">(+) New</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Twitter handle</th>
                                <th scope="col">Albums</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artists as $artist)
                                <tr>
                                    <th scope="row">{{ $artist->id }}</th>
                                    <td>{{ $artist->artist_name }}</td>
                                    <td>{{ $artist->twitter_handle }}</td>
                                    <td>
                                        @foreach($artist->albums as $album)
                                            <p>{{ $album->album_name }}({{ $album->year }})</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('artists.show', $artist) }}">Show</a>                                        
                                        <a class="btn btn-sm btn-warning" href="{{ route('artists.edit', $artist) }}">Edit</a>
                                        <form method="POST" action="{{ route('artists.destroy', $artist) }}">
                                            @csrf

                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
