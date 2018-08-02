@extends('layouts.admin')
@section('content-header')
    <h1>
        Seriale Create
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('seriale.index') }}"><i class="fa fa-dashboard"></i> Seriale</a></li>
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="row m-3" style="background-color: whitesmoke">
            <div class="col-xs-12">
                <form method="post" action="{{ route('seriale.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="created_year">Created Year</label>
                        <input type="text" class="form-control" name="created_year" placeholder="Created Year">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
