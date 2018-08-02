@extends('layouts.admin')
@section('content-header')
    <h1>
        Seriale
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('seriale.index') }}"><i class="fa fa-dashboard"></i> Seriale</a></li>
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="row m-3" style="background-color: whitesmoke">
            <div class="col-xs-12 col-sm-8 col-md-8 offset-2">
                <h2>Genres</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">title</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    @foreach($seriales as $seriale)
                        <tbody>
                        <tr>
                            <th scope="row">{{ $seriale->id }}</th>
                            <td>{{ $seriale->title }}</td>
                            <td><a href="{{ route('seriale.edit', $seriale->id) }}"><button class="btn btn-info">Edit</button> </a> </td>
                            <td>
                                <form method="POSt" action="{{ route('seriale.destroy', $seriale->id) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button> </form>
                            </td>
                        </tr>

                        </tbody>
                    @endforeach
                </table>
                <div class="row">
                    {{ $seriales->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection
