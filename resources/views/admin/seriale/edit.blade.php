@extends('layouts.admin')
@section('content-header')
    <h1>
        Seriale Edit
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('seriale.index') }}"><i class="fa fa-dashboard"></i> Seriale</a></li>
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="content">
           <div class="row">
              <a class="float-right" href="{{ route('sezone.create', $seriale->id) }}"> <button class="btn btn-primary">Add Sezone</button></a>
           </div>
            <div class="row m-3" style="background-color: whitesmoke">
                @if($seriale->sezones)
                    <div class="col-xs-12 col-sm-8 offset-2">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nr</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            @foreach($seriale->sezones as $sezone)
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $sezone->id }}</th>
                                    <td>{{ $sezone->sezone_nr }}</td>
                                    <td><a href="{{ route('sezone.edit', [$seriale->id, $sezone->id]) }}"><button class="btn btn-info">Edit</button> </a> </td>
                                    <td>
                                        <form method="POSt" action="{{ route('sezone.destroy', [$seriale->id, $sezone->id]) }}">
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
                <form action="{{ route('seriale.update', $seriale->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="title">Seriale Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $seriale->title }}">
                    </div>

                    <div class="form-group">
                        <label for="created_year">Created Year</label>
                        <input type="number" class="form-control" name="created_year" value="{{ $seriale->created_year }}">
                    </div>

                    <hr>
                    <div class="row">
                        @if($seriale->getMedia('SerialePoster'))
                            <div class="col-xs-10 col-sm-6 col-md-3 offset-2">
                                <img class="img-fluid"  src="{{ $seriale->getFirstMediaUrl('SerialePoster') }}">
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
