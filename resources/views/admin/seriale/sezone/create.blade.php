@extends('layouts.admin')
@section('content-header')
    <h1>
        Sezone Create
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('seriale.edit', $seriale->id) }}"><i class="fa fa-dashboard"></i> Seriale</a></li>
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="row m-3" style="background-color: whitesmoke">
            <div class="col-xs-12">
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors }}</div>
                @endif
                <form action="{{ route('sezone.store', $seriale->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="sezone_nr">Sezone number</label>
                        <input type="number" class="form-control" name="sezone_nr" placeholder="Another input">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
