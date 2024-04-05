<!-- resources/views/leave/create.blade.php -->

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
        <form action="{{ route('leaveDetail.store') }}" method="POST">
            @csrf <!-- CSRF Token -->

            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="text" name="EmployeeID" id="EmployeeID" class="form-control">
            </div>

            <div class="form-group">
                <label for="leave_code">Leave Code:</label>
                <input type="text" name="LeaveCode" id="LeaveCode" class="form-control">
            </div>

            <div class="form-group ">
          <label for="type_of_leave" class="col-sm-2 col-form-label">Leave Description</label>
          <div class="col-sm-12">
            <select class="form-control" name = "LeaveDesc" id="LeaveDesc" aria-label="Default select example" required>
              <option selected disabled>Select a leave type</option>
              <option value="Sick leave">Sick leave</option>
              <option value="Casual leave">Casual leave</option>
              <option value="Duty Leave">Duty Leave</option>
              <option value="Maternity leave">Maternity leave</option>
              <option value="Paternity leave">Paternity leave</option>
              <option value="Bereavement leave">Bereavement leave</option>
              <option value="Compensatory leave">Compensatory leave</option>
              <option value="Sabbatical leave">Sabbatical leave</option>
              <option value="Unpaid Leave">Unpaid Leave</option>

            </select>
          </div>
        </div>

            <div class="form-group">
                <label for="LeaveDays">Leave Days:</label>
                <input type="number" name="LeaveDays" id="LeaveDays" class="form-control">
            </div>

            <div class="form-group">
                <label for="RemainingDays">Remaining Days:</label>
                <input type="number" name="RemainingDays" id="RemainingDays" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
