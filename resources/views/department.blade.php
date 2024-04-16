
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
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
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
            <button type="submit" class="btn btn-primary">Create Department</button>
        </form>
    </div>
  </div>
  <div class="card" style="margin-left:50px;margin-right: 50px;margin-top: 10px">
    <div class="col-sm-12 card-header bg-dark text-center font-weight-bold ">
    Department List
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Department Code</th>
                    <th>Department Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                <tr>
                    <td>{{ $department->department_name }}</td>
                    <td>{{ $department->department_code }}</td>
                    <td>{{ $department->department_description }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
  @endsection
