<!-- resources/views/leavecodes/create.blade.php -->

@extends('layouts.master')

@section('content')
<div class="card" style="margin-left:50px;margin-right: 50px;margin-top: 10px">
    <div class="col-sm-12 card-header bg-dark text-center font-weight-bold ">
      ASSIGN LEAVES
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
    <form action="{{ route('leavecodes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="LeaveCode">Leave Code:</label>
            <input type="text" name="LeaveCode" id="LeaveCode" class="form-control">
        </div>

        <div class="form-group">
            <label for="LeaveDesc">Leave Description:</label>
            <input type="text" name="LeaveDesc" id="LeaveDesc" class="form-control">
        </div>

        <div class="form-group">
            <label for="LeaveDays">Leave Days:</label>
            <input type="number" name="LeaveDays" id="LeaveDays" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div\>
@endsection
