@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-body">
      <h3 class="panel-title" style="text-align:center;"> Pending Requests</h3>
      <br>


@foreach ($leave_pending_data as $key => $data)
    <div class="card text-white bg-dark mb-3">
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