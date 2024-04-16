@extends('layouts.master')
@section('content')
<div class="card" style="margin-left:50px;margin-right: 50px;margin-top: 10px">
    <div class="col-sm- card-header bg-secondary text-center font-weight-bold " style="text-align:center;">
      Welcome
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

        <div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($leaveDetails as $leaveDetail)
                            @if ($leaveDetail->LeaveCode === 'L-009')
                                <div class="col-lg-4 col-md-6"style="text-align:center;">>
                                    <!-- small box -->
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <div class="leave-detail leave-type-{{ substr($leaveDetail->LeaveCode, -1) }}">
                                                <!-- Display leave details -->
                                                <h5>{{ $leaveDetail->LeaveDesc }}</h5>
                                                <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                                                <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="{{ route('leave') }}" class="small-box-footer">Apply Leave <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                
        </div><br>
        <div class="card-body" style="margin-left: 0;">
            <h3 class="panel-title" style="text-align:center;">Requests History</h3>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white">
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
                        <tr > 
                            <td>{{ $data->date_of_leave }}</td>
                            <td>{{ $data->end_of_leave }}</td>
                            <td>{{ $data->date_of_request }}</td>
                            <td>{{ $data->type_of_leave }}</td>
                            <td>{{ $data->staff_id }}</td>
                            <td>{{ $data->description }}</td>
                            <td class="{{ $cardColor }}">{{ $data->approval_status }}</td>
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
</div>
@endsection
