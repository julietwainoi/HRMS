@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Create New Leave Code</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('leavecodes.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="leave_code">Leave Code:</label>
                    <input type="text" name="leave_code" id="leave_code" class="form-control">
                </div>

                <div class="form-group">
                    <label for="leave_desc">Leave Description:</label>
                    <input type="text" name="leave_desc" id="leave_desc" class="form-control">
                </div>

                <div class="form-group">
                    <label for="leave_days">Leave Days:</label>
                    <input type="number" name="leave_days" id="leave_days" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
