
@extends('layouts.master')

@section('content')
<div class="card" style="margin-left:50px;margin-right: 50px;margin-top: 10px">
    <div class="col-sm-12 card-header bg-dark text-center font-weight-bold ">
    CREATE ROLES
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="name">Role Name:</label>
    <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description" id="description" class="form-control"required></textarea>
    </div>
    <button type="submit">Create Role</button>
</form>
    </div>
</div>
@endsection