@extends('layouts.show-admin')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($seriales as $seriale)
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-header">{{ $seriale->title }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
