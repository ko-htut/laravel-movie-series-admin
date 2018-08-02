@extends('layouts.admin')
@section('content-header')
    <h1>
        Episode Create
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('sezone.edit', [$seriale->id, $sezone->id]) }}"><i class="fa fa-dashboard"></i> Sezone</a></li>
        <li><a href="{{ route('seriale.index') }}"><i class="fa fa-dashboard"></i> Seriale</a></li>
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="content">
            <div class="row m-3" style="background-color: whitesmoke">
                @if($episode->embeds)
                    @foreach($episode->embeds as $embed)
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
            <div class="row m-3" style="background-color: whitesmoke">

                <form method="post" action="{{ action('Admin\EpisodeController@addEmbed', [$seriale->id,$sezone->id,$episode->id]) }}">
                    {{ csrf_field() }}
                    <label for="web_name">Web Name</label>
                    <input type="text" name="web_name">
                    <label for="web_url">Web Url</label>
                    <input type="text" name="web_url">
                    <button type="submit" class="bn btn-primary">Add Embed</button>
                </form>
            </div>
            <hr>
            <div class="row m-3" style="background-color: whitesmoke">
                @if($episode->shikolinks)
                    @foreach($episode->shikolinks as $shikolink)
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
            <div class="row m-3" style="background-color: whitesmoke">

                <form method="post" action="{{ action('Admin\EpisodeController@addShikolinks', [$seriale->id,$sezone->id,$episode->id]) }}">
                    {{ csrf_field() }}
                    <label for="web_name">Web Name</label>
                    <input type="text" name="web_name">
                    <label for="web_url">Web Url</label>
                    <input type="text" name="web_url">
                    <button type="submit" class="bn btn-primary">Add Shiko Link</button>
                </form>
            </div>
            <hr>
            <div class="row m-3" style="background-color: whitesmoke">
                @if($episode->shkarkolinks)
                    @foreach($episode->shkarkolinks as $shkarkolinks)
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
            <div class="row m-3" style="background-color: whitesmoke">
                <form method="post" action="{{ action('Admin\EpisodeController@addShkarkolinks', [$seriale->id,$sezone->id,$episode->id]) }}">
                    {{ csrf_field() }}
                    <label for="web_name">Web Name</label>
                    <input type="text" name="web_name">
                    <label for="web_url">Web Url</label>
                    <input type="text" name="web_url">
                    <button type="submit" class="bn btn-primary">Add Shkarko Link</button>
                </form>
            </div>
            <hr>
            <div class="row m-3" style="background-color: whitesmoke">
                @if($episode->trailerlinks)
                    @foreach($episode->trailerlinks as $trailerlink)
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
            <div class="row m-3" style="background-color: whitesmoke">
                <form method="post" action="{{ action('Admin\EpisodeController@addTrailerlinks', [$seriale->id,$sezone->id,$episode->id]) }}">
                    {{ csrf_field() }}
                    <label for="web_name">Web Name</label>
                    <input type="text" name="web_name">
                    <label for="web_url">Web Url</label>
                    <input type="text" name="web_url">
                    <button type="submit" class="bn btn-primary">Add Trailer Link</button>
                </form>
            </div>
            <hr>
        </div>
        <div class="row m-3" style="background-color: whitesmoke">
            <div class="col-xs-12 col-sm-8 col-mf-8 offset-2">
                <h3>Edit Episode</h3>
                <form action="{{ route('episode.update', [$seriale->id,$sezone->id,$episode->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="title">Movie Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $episode->title }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
