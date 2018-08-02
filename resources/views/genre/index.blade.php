@extends('layouts.show-admin')

@section('content')
    <div class="container">
    <div class="row">
        @foreach($genre->movies as $movie)
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-header">{{ $movie->title }}</div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
