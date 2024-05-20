@extends('layouts.master')
@section('content')

<div class="content bg-white">
        <div class="card">
            <section class="content">
                <div class="container-fluid">
                    <div class="row" style="margin-top: 10px">
                        @foreach ($leaveDetails as $leaveDetail)
                            @if ($leaveDetail->LeaveCode === 'L-010')
                                <div class="col-lg-4 col-md-6" style="text-align:center;">
                                    <!-- small box -->
                                    <div class="small-box ">
                                        <div class="inner">
                                            <div class="leave-detail leave-type-{{ substr($leaveDetail->LeaveCode, -1) }}">
                                                <!-- Display leave details -->
                                                <h5>{{ $leaveDetail->LeaveDesc }}</h5>
                                                <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="{{ route('leave') }}" class="small-box-footer hover-effect ">Apply Leave <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        </div><br>
<div style="background-color: lightgreen; height: 50px;"></div>
        
        <div class="card">  
        <div class="card-body" >
            <h3 class="panel-title" style="font-family: 'Arial', sans-serif;">Pending Leave Requests </h3>
            <br>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class=" text-dark">
                            <tr>
                                <th>Date of Leave</th>
                                <th>End of Leave</th>
                                <th>Department</th>
                                <th>Leave Type</th>
                                <th>Staff ID Number</th>
                                <th>Reason For Leave</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendingLeaves as $key => $pendingLeave)
                                <tr>
                                    <td>{{ $pendingLeave->date_of_leave }}</td>
                                    <td>{{ $pendingLeave->end_of_leave }}</td>
                                    <td>{{ $pendingLeave->department_name }}</td>
                                    <td>{{ $pendingLeave->type_of_leave }}</td>
                                    <td>{{ $pendingLeave->staff_id }}</td>
                                    <td>{{ $pendingLeave->description }}</td>
                                    <td>
                                        <a href="/reject-request/{{ $pendingLeave->id }}" class="btn btn-danger">Decline</a>
                                        <a href="/accept-request/{{ $pendingLeave->id }}" class="btn btn-primary">Accept</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body col-sm-12" >
                    <h3 class="panel-title"   style="font-family: 'Arial', sans-serif;">My leave Requests</h3>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-dark">
                                <tr>
                                    <th>Date of Leave</th>
                                    <th>End of Leave</th>
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
                                    <tr> 
                                        <td>{{ $data->date_of_leave }}</td>
                                        <td>{{ $data->end_of_leave }}</td>
                                        <td>{{ $data->date_of_request }}</td>
                                        <td>{{ $data->type_of_leave }}</td>
                                        <td>{{ $data->staff_id }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td >{{ $data->approval_status }}</td>
                                        <td>
                                            <form action="{{ route('leave_delete', ['data' => $data->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm confirmation">Delete Request</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
      
    </div>
</div>
@endsection
