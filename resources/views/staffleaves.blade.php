@extends('layouts.master')
@section('content')
<div class="card ">
   
    <div class="card-body" style="margin-left: 0;">
        <h3 class="panel-title" >Requests History</h3>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="text-dark">
                    <tr>
                        <th>Date of Leave</th>
                        <th>End of Leave</th>
                        <th>Staff Name</th>
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
                            case 'Pending':
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
                    <tr > 
                        <td>{{ $data->date_of_leave }}</td>
                        <td>{{ $data->end_of_leave }}</td>
                        <td>{{ $data->Name }}</td>
                        <td>{{ $data->type_of_leave }}</td>
                        <td>{{ $data->staff_id }}</td>
                        <td>{{ $data->description }}</td>
                        <td >{{ $data->approval_status }}</td>
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
