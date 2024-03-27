@extends('layouts.master')
@section('content')


    <meta name="csrf-token" content="{{csrf_token() }}">
    <link href='//stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css' rel='stylesheet'>
    <title>employee form</title>

<body>


     <div class='card'>
        <div class="card-header text-center font-weight-bold">
            Applying for Leave
        </div>
    <div class="card-body">
  
        <form name="leave" id="leave" method="post" action="{{url('/leave-form')}}">
           @csrf
      <div class="form group">
    <label for="staff_id">STAFF ID </label>
    <input type="text" id="staff_id" name="staff_id" class="form-control" required="">
    </div><br>
   
   <div class="form-group row">
          <label for="type_of_leave" class="col-sm-2 col-form-label">Type of Leave</label>
          <div class="col-sm-8">
            <select class="form-control" name = "type_of_leave" id="type_of_leave" aria-label="Default select example" required>
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
@section('another_section')
<div class="card">
    <div class="card-body">
        <h3 class="panel-title" style="text-align:center;">Pending Requests</h3>
        <br>

        @foreach ($leave_pending_data as $key => $data)
        <div class="card text-white bg-dark mb-3"  style="margin-left:250px;">
            <div class="card-header bg-dark">
                <strong>{{ $data->date_of_leave }}</strong>
                <i class="float-right" style="font-size:85%;">Request sent on: {{ $data->date_of_request }}</i>
            </div>
            <div class="card-body">
        
            <tr>
           
            <td>Leave type:{{ $data->type_of_leave }}</td><br>
            <td>Staff ID Number:{{ $data->staff_id }}<td><br>
            <td>Reason For Leave:{{ $data->description }}<td><br>
           </tr>
                <a class="btn btn-danger float-right confirmation" href="/delete-leave-pending-request-in-staff-account/{{ $data->auto_id }}">Delete Request</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
