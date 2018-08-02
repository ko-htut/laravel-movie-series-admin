@extends('layouts.admin')
@section('content-header')
    <h1>
        Admin
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    </ol>
    @endsection
@section('content')
    <h3>Welcome to admin panel</h3>
@endsection
