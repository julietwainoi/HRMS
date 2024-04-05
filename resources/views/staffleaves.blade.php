@extends('layouts.master')
@section('content')
<div class="card ">
    @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif
    <div class="card-header bg-success"style="margin: 25px;text-align:center;">
        <h5 class="card-title " style="margin-left:100px;"> please see your leave request history</h5>
    </div>
    <div class="card-body" style="margin-left: 0;">
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
@endsection
