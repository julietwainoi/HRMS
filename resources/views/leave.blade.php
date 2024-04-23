@extends('layouts.master')
@section('content')


<div class="card" style="margin-left:50px;margin-right: 50px;margin-top: 10px">
  <div class="col-sm-12 card-header bg-dark text-center font-weight-bold ">
  APPLY LEAVE
  </div>
  <div class="card-body">
      @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif
     
   </div style="margin-left:250px;"> @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
    <div class="card-body">
  
        <form name="leave" id="leave" method="post" action="{{url('/leave-form')}}">
           @csrf
      <div class="form group">
    <label for="staff_id">STAFF ID </label>
    <input type="text" id="staff_id" name="staff_id" class="form-control" required="">
    </div><br>
   
    <div class="form-group">
      <label for="type_of_leave" class="col-sm-2 col-form-label">Type of Leave</label>
      <div class="col-sm-12">
          <select class="form-control" name="type_of_leave" id="type_of_leave" aria-label="Default select example" required>
              <option selected disabled>Select a leave type</option>
              @foreach($leaveDescriptions as $leaveDescription)
                  <option value="{{ $leaveDescription }}">{{ $leaveDescription }}</option>
              @endforeach
          </select>
      </div>
  </div>
  
  <div class="form-group">
    <label for="department" class="col-sm-2 col-form-label">department</label>
    <div class="col-sm-12">
        <select class="form-control" name="department_name" id="department_name" aria-label="Default select example" required>
            <option selected disabled>Select department</option>
            @foreach($departmentNames as $departmentName)
           <option value="{{ $departmentName }}">{{ $departmentName }}</option>
           @endforeach
        </select>
        </div>
      </div>
  
            <div class="form group">
  <label for="description">Add Reason: </label>
  <textarea  id="description" name="description" class="form-control" required=""></textarea>
</div>
<div class="form group">
  <label for="date_of_leave">startdate:</label>
  <input type="date" id="date_of_leave" name="date_of_leave" class="form-control" required="">
</div>
<div class="form group">
  <label for="end_of_leave">enddate:</label>
  <input type="date" id="end_of_leave" name="end_of_leave" class="form-control" required="">
</div>
<div class="form group">

<input type="hidden" name="approval_status" value="Pending">
</div><br>
<button type="submit" class="btn btn-primary">submit</button>
    </form>
    
    
    
    </div>
    
</div>


</div>

@endsection
{{--@section('another_section')
<div class="card">
    <div class="card-body" style="margin-left:250px;">
        <h3 class="panel-title" style="text-align:center;">Pending Requests</h3>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Date of Leave</th>
                        <th>Request Sent On</th>
                        <th>Leave Type</th>
                        <th>Staff ID Number</th>
                        <th>Reason For Leave</th>
                        <th>Leave Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_leave_data as $key => $data)
                    @php
                        $cardColor = '';

                        switch ($data->approval_status) {
                            case '[PENDING]':
                                $cardColor = 'bg-primary'; // Green color for pending status
                                break;
                            case '[REJECTED]':
                                $cardColor = 'bg-warning'; // Yellow color for rejected status
                                break;
                            case '[ACCEPTED]':
                                $cardColor = 'bg-success'; // Blue color for accepted status
                                break;
                            default:
                                $cardColor = ''; // Default color if status is unknown
                                break;
                        }
                    @endphp
                    <tr class="{{ $cardColor }}">
                        <td>{{ $data->date_of_leave }}</td>
                        <td>{{ $data->date_of_request }}</td>
                        <td>{{ $data->type_of_leave }}</td>
                        <td>{{ $data->staff_id }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->approval_status }}</td>
                        <td>
                            <a href="/delete-leave-pending-request-in-staff-account/{{ $data->auto_id }}" class="btn btn-danger confirmation">Delete Request</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection--}}
