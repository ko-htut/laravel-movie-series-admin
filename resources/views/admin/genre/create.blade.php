@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form action="{{ route('genre.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="genre_type">Genre Type</label>
                        <input type="text" class="form-control" name="genre_type" placeholder="Another input">
                    </div>
                    <div class="form-group">
                        <label for="genre_description">Description</label>
                    </div>
                    <div class="form-group">
                        <textarea name="genre_description"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
