@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-body">
        <h3 class="panel-title" style="text-align:center;">Pending Requests</h3>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Date of Leave</th>
                        <th>End of Leave</th> <!-- Added this column -->
                        <th>Request Sent On</th>
                        <th>Leave Type</th>
                        <th>Staff ID Number</th>
                        <th>Reason For Leave</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leave_pending_data as $key => $data)
                    <tr>
                        <td>{{ $data->date_of_leave }}</td>
                        <td>{{ $data->end_of_leave }}</td> <!-- Added data for end_of_leave -->
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->type_of_leave }}</td>
                        <td>{{ $data->staff_id }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                            <a href="/reject-request/{{$data->id}}" class="btn btn-danger">Decline</a>
                            <a href="/accept-request/{{$data->id}}" class="btn btn-primary">Accept</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
