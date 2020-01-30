@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="text-center">HOME</h3></div>
                <div class="card-body">
                    @auth
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>You are logged in!</p>
                    @else
                        <p>This is the homepage!</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
