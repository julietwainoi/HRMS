@extends('layouts.master')

@section('content')
<div class="card" style="margin-left:50px;margin-right: 50px;margin-top: 10px">
    <div class="col-sm-12 card-header bg-dark text-center font-weight-bold ">
update profile
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
        <form action="{{ route('profile.update', $user->IDNo) }}"method="POST">
           
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="IDNo">Staff Number:</label>
                <input type="text" name="IDNo" id="IDNo" class="form-control" placeholder="<?php echo $user->IDNo; ?>"  required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="<?php echo $user->name; ?>"required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <textarea  id="email" name="email" class="form-control" placeholder="<?php echo $user->email; ?>" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update profile</button>
        </form>
    </div>
  </div>
  @endsection