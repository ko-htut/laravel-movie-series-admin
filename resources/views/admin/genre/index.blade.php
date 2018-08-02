@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>Genres</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Genre type</th>
                        <th scope="col">Genre Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    @foreach($genres as $genre)
                    <tbody>
                    <tr>
                        <th scope="row">{{ $genre->id }}</th>
                        <td>{{ $genre->genre_type }}</td>
                        <td>{{ $genre->genre_description }}</td>
                        <td><a href="{{ route('genre.edit', $genre->id) }}">Edit</a> </td>
                        <td>
                            <form method="POSt" action="{{ route('genre.destroy', $genre->id) }}">
                                <input name="_method" type="hidden" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button> </form>
                        </td>
                    </tr>

                    </tbody>
                        @endforeach
                </table>
            </div>

        </div>
    </div>

@endsection
