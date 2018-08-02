@extends('layouts.admin')
@section('content-header')
    <h1>
        Sezone Edit
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('seriale.edit', $seriale->id) }}"><i class="fa fa-dashboard"></i> Seriale</a></li>
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="content m-3" style="background-color: whitesmoke">
            <div class="row m-3" >
                <a class="float-right" href="{{ route('episode.create', [$seriale->id,$sezone->id]) }}"> <button class="btn btn-primary">Add Episode</button></a>
            </div>
            <div class="row">
                @if($sezone->episodes)
                    <div class="col-xs-12 col-sm-8 offset-2">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            @foreach($sezone->episodes as $episode)
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $episode->id }}</th>
                                    <td>{{ $episode->title }}</td>
                                    <td><a href="{{ route('episode.edit', [$seriale->id,$sezone->id,$episode->id]) }}"><button class="btn btn-info">Edit</button> </a> </td>
                                    <td>
                                        <form method="POSt" action="{{ route('episode.destroy', [$seriale->id,$sezone->id,$episode->id]) }}">
                                            <input name="_method" type="hidden" value="DELETE">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button> </form>
                                    </td>
                                </tr>

                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @endif
            </div>

        </div>
        <div class="row m-3" style="background-color: whitesmoke">
            <div class="col-xs-12 col-sm-8 col-mf-8 offset-2">
                <form action="{{ route('sezone.update', [$seriale->id,$sezone->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="sezone_nr">Nr</label>
                        <input type="text" class="form-control" name="sezone_nr" value="{{ $sezone->sezone_nr }}">
                    </div>

                    <hr>
                    <div class="row">
                        @if($sezone->getMedia('SezonePoster'))
                            <div class="col-xs-10 col-sm-6 col-md-3 offset-2">
                                <img class="img-fluid"  src="{{ $sezone->getFirstMediaUrl('SezonePoster') }}">
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
