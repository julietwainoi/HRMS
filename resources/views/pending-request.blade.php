@extends('layouts.master')
@section('content')




   <div class="card" >
    <section class="content">
        <div class="container-fluid">
            <div class="row"style="margin-top: 10px">
                @foreach ($leaveDetails as $leaveDetail)
                    @if ($leaveDetail->LeaveCode === 'L-010')
                        <div class="col-lg-4 col-md-6" style="text-align:center;margin-top: 10px">
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
                                <a href="{{ route('leave') }}" class="small-box-footer ">Apply Leave <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    </div>


<div class="card">
    <div class="card-body col-sm-12">
        <h3 class="panel-title">Pending Requests</h3>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class=" text-dark">
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
