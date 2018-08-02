@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger">{{ $errors }}</div>
            @endif
            <div class="col-xs-12">
                <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Movie Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Another input">
                    </div>
                    <div class="form-group">
                        <label for="runing_time">Runing Time</label>
                        <input type="number" class="form-control" name="runing_time" placeholder="Another input">
                    </div>
                    <div class="form-group">
                        <label for="release_date">Release Date</label>
                        <input type="number" class="form-control" name="release_date" placeholder="Another input">
                    </div>
                    <div class="form-group">
                        <label for="movie_description">Description</label>
                        <textarea class="form-control" name="movie_description"></textarea>
                    </div>
                    <select class="custom-select" name="genre[]" multiple>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre_type }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <div>
                            <label for="avatar">picture:</label>
                            <input type="file"
                                   id="avatar" name="image"
                                   accept="image/*" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
