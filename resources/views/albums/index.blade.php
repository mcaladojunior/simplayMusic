@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10">
            <div class="card">
                <div class="card-header"><h3 class="text-center">{{ __('Albums') }}</h3></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Year</th>
                                <th scope="col">album</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums as $album)
                                <tr>
                                    <th scope="row">{{ $album->id }}</th>
                                    <td>{{ $album->album_name }}</td>
                                    <td>{{ $album->year }}</td>
                                    <td>{{ $album->artist->artist_name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('albums.show', $album) }}">Show</a>                                        
                                        <a class="btn btn-sm btn-warning" href="{{ route('albums.edit', $album) }}">Edit</a>
                                        <form method="POST" action="{{ route('albums.destroy', $album) }}">
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
