<!-- resources/views/leave/create.blade.php -->

@extends('layouts.master')

@section('content')
<div class="card" style="margin-left:50px;margin-right: 50px;margin-top: 10px">
    <div class="col-sm-12 card-header bg-dark text-center font-weight-bold ">
   ASSIGN ROLE
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

<section class="content">
<form method="POST" action="{{ route('assign.role') }}">
    @csrf
    <div class="form group">
    <label for="IDNo">User IDNo:</label><br>
    <input type="text" id="IDNo" name="IDNo" class="form-control"  required=""><br>
    </div>
    <div class="form group">
    <label for="roleId">Role ID:</label><br>
    <input type="text" id="roleId" name="roleId" class="form-control"  required=""><br>
    </div><br>
    <button type="button" class="btn btn-primary">Assign Role</button>
</form>

</section>
</div>
</div>
@endsection