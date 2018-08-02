@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                @if($movie->embeds)
                    @foreach($movie->embeds as $embed)
                        <ul>
                            <li>{{ $embed->web_name }}</li>
                            <form method="post" action="/embeds/{{ $embed->id }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-primary">Delete</button>
                            </form>

                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="row">

                <form method="post" action="{{ action('Admin\MovieController@addEmbed', $movie->id) }}">
                    {{ csrf_field() }}
                    <label for="web_name">Web Name</label>
                    <input type="text" name="web_name">
                    <label for="web_url">Web Url</label>
                    <input type="text" name="web_url">
                    <button type="submit" class="bn btn-primary">Add Embed</button>
                </form>
            </div>
            <hr>
            <div class="row">
                @if($movie->shikolinks)
                    @foreach($movie->shikolinks as $shikolink)
                        <ul>
                            <li>{{ $shikolink->web_name }}</li>
                            <form method="post" action="/shikolinks/{{ $shikolink->id }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-primary">Delete</button>
                            </form>

                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="row">

                <form method="post" action="{{ action('Admin\MovieController@addShikolinks', $movie->id) }}">
                    {{ csrf_field() }}
                    <label for="web_name">Web Name</label>
                    <input type="text" name="web_name">
                    <label for="web_url">Web Url</label>
                    <input type="text" name="web_url">
                    <button type="submit" class="bn btn-primary">Add Shiko Link</button>
                </form>
            </div>
            <hr>
            <div class="row">
                @if($movie->shkarkolinks)
                    @foreach($movie->shkarkolinks as $shkarkolinks)
                        <ul>
                            <li>{{ $shkarkolinks->web_name }}</li>
                            <form method="post" action="/shkarkolinks/{{ $shkarkolinks->id }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-primary">Delete</button>
                            </form>

                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="row">

                <form method="post" action="{{ action('Admin\MovieController@addShkarkolinks', $movie->id) }}">
                    {{ csrf_field() }}
                    <label for="web_name">Web Name</label>
                    <input type="text" name="web_name">
                    <label for="web_url">Web Url</label>
                    <input type="text" name="web_url">
                    <button type="submit" class="bn btn-primary">Add Shkarko Link</button>
                </form>
            </div>
            <hr>
            <div class="row">
                @if($movie->trailerlinks)
                    @foreach($movie->trailerlinks as $trailerlink)
                        <ul>
                            <li>{{ $trailerlink->web_name }}</li>
                            <form method="post" action="/trailerlinks/{{ $trailerlink->id }}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-primary">Delete</button>
                            </form>

                        </ul>
                    @endforeach
                @endif
            </div>
            <div class="row">

                <form method="post" action="{{ action('Admin\MovieController@addTrailerlinks', $movie->id) }}">
                    {{ csrf_field() }}
                    <label for="web_name">Web Name</label>
                    <input type="text" name="web_name">
                    <label for="web_url">Web Url</label>
                    <input type="text" name="web_url">
                    <button type="submit" class="bn btn-primary">Add Trailer Link</button>
                </form>
            </div>
            <hr>
            <div class="row">
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-mf-8 offset-2">
                <form action="{{ route('movie.update', $movie->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="title">Movie Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $movie->title }}">
                    </div>
                    <div class="form-group">
                        <label for="runing_time">Runing Time</label>
                        <input type="number" class="form-control" name="runing_time" value="{{ $movie->runing_time }}">
                    </div>
                    <div class="form-group">
                        <label for="release_date">Release Date</label>
                        <input type="number" class="form-control" name="release_date" value="{{ $movie->release_date }}">
                    </div>
                    <div class="form-group">
                        <label for="movie_description">Description</label>
                        <textarea class="form-control" name="movie_description">{{ $movie->movie_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="genre[]" multiple>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->genre_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="row">
                        @if($movie->getMedia('poster'))
                            <div class="col-xs-10 col-sm-6 col-md-3 offset-2">
                                <img class="img-fluid"  src="{{ $movie->getFirstMediaUrl('poster') }}">
                            </div>
                        @endif
                        <div class="form-group">
                            <div>
                                <label for="avatar">picture:</label>
                                <input type="file"
                                       id="avatar" name="image"
                                       accept="image/*" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
