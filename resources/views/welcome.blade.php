@extends('layouts.show-admin')

@section('content')
    <div class="container">
        <div id="app" class="row">
            @foreach($movies as $movie)
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-header">{{ $movie->title }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    <!-- jQuery 3 -->
    <script src="{{ asset('js/app.js') }}"></script>
    @endsection