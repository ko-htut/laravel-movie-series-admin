@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 offset-2">
                <h2>Genres</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Genre type</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    @foreach($movies as $movie)
                        <tbody>
                        <tr>
                            <th scope="row">{{ $movie->id }}</th>
                            <td>{{ $movie->title }}</td>
                            <td><a href="{{ route('movie.edit', $movie->id) }}"><button class="btn btn-info">Edit</button> </a> </td>
                            <td>
                                <form method="POSt" action="{{ route('movie.destroy', $movie->id) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button> </form>
                            </td>
                        </tr>

                        </tbody>
                    @endforeach
                </table>
                <div class="row">
                    {{ $movies->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection
