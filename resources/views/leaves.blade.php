


<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">Requesting for leave</h3>
      <br>

      <form method="POST" action="{{url('insert-leave-data') }}" >
        {{ csrf_field() }}
        
        <div class="form-group row">
          <label for="date_of_leave" class="col-sm-2 col-form-label">staff ID</label>
          <div class="col-sm-4">
              <input type="text" class="staff_id" id="staff_id" name="staff_id" required>
          </div>
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

        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-8">

            <textarea class="form-control" name="description" id="description" placeholder="Enter the description" required></textarea>

          </div>
        </div>

        <div class="form-group row">
          <label for="date_of_leave" class="col-sm-2 col-form-label">Date of Leave</label>
          <div class="col-sm-4">
              <input type="date" class="form-control" id="date_of_leave" name="date_of_leave" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="end_of_leave" class="col-sm-2 col-form-label">End of Leave</label>
          <div class="col-sm-4">
              <input type="date" class="form-control" id="end_of_leave" name="end_of_leave" required>
          </div>
        </div>

        <div class="form-group row">
          <label style="visibility:hidden;" for="button" class="col-sm-2 col-form-label">button</label>
          <div class="col-sm-8">
            <input class="btn btn-primary col-md-2 col-sm-12" value="Submit" id="button" type="submit">
          </div>
        </div>

      </form>

    </div>
</div>

<br>

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;">My Pending Requests</h3>
      <br>

      @foreach ($leave_pending_data as $key => $data)

          <div class="card text-white bg-dark mb-3">
            <div class="card-header bg-dark ">
              <strong>{{$data->date_of_leave}}</strong>
              <i class="float-right" style="font-size:85%;">Request sent on :- {{$data->date_of_request}}</i>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$data->type_of_leave}}</h5>
              <p class="card-text">{{$data->description}}</p>
              <a class="btn btn-danger float-right confirmation" href="/delete-leave-pending-request-in-staff-account/{{$data->auto_id}}">Delete Request</a>
            </div>
          </div>

      @endforeach



    </div>
</div>

@endsection


