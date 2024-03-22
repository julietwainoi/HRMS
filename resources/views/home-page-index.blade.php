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
        <div class="form-group">
        <label for="exampleaddtitle">Full Name</label>
       <input type="text" id="fullname" name="fullname" class="form-control" required="">
        </div>
    <div class="form group">
    <label for="exampleaddtitle">ID NUMBER</label>
    <input type="text" id="IDNO" name="IDNO" class="form-control" required=""></textarea>
    </div>
    <div class="form group">
    <label for="exampleaddtitle">Email</label>
    <input type="email" id="email" name="email" class="form-control" required=""></textarea>
    </div>
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
  <label for="startdate">startdate:</label>
  <input type="date" id="startdate" name="startdate">
</div>
<div class="form group">
  <label for="startdate">enddate:</label>
  <input type="date" id="enddate" name="enddate">

</div>
<div class="form group">
  <label for="Reason">Add Reason: </label>
  <input type="text" id="Reason" name="Reason">
</div>
<button type="submit" class="btn btn-primary">submit</button>
    </form>
    
    
    
    </div>
    
</div>


</div>


    
</body>
@endsection