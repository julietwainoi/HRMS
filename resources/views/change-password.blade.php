<!-- resources/views/leave/create.blade.php -->

@extends('layouts.master')

@section('content')
<div class="card" style="margin-left:50px;margin-right: 50px;margin-top: 10px">
    <div class="col-sm-12 card-header bg-dark text-center font-weight-bold ">
    CHANGE PASSWORD
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
<form method="POST" action="{{ route('change.password') }}">
    @csrf
   

    <div class="form group">
        <label for="current_password">Current Password</label><br>
        <input id="current_password" type="password" name="current_password" class="form-control"  required="">
    </div><br>

    <div class="form group">
        <label for="new_password">New Password</label>
        <input id="new_password" type="password" name="new_password" class="form-control" required ="">
    </div>

    <div  class="form group">
        <label for="new_password_confirmation">Confirm New Password</label><br>
        <input id="new_password_confirmation" type="password" name="new_password_confirmation" class="form-control"  required="">
    </div><br>

    <button type="button" class="btn btn-primary">Change Password</button>
</form>
        </section>
@endsection