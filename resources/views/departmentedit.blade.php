@extends('layouts.master')

@section('content')
<div class="card" style="margin-left:50px;margin-right: 50px;margin-top: 10px">
    <div class="col-sm-12 card-header bg-dark text-center font-weight-bold ">
    CREATE Department
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
        <form action="{{ route('departments.update', $department->id) }}"method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="department_name">Department Name:</label>
                <input type="text" name="department_name" id="department_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="department_code">Department Code:</label>
                <input type="text" name="department_code" id="department_code" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="department_description">Department Description:</label>
                <textarea  id="department_description" name="department_description" class="form-control" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Department</button>
        </form>
    </div>
  </div>
  @endsection