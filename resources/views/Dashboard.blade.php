@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a> </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        @php $count = 0; @endphp
        @foreach ($leaveDetails as $leaveDetail)
            @if ($count % 3 == 0)
                <div class="row">
            @endif
            <div class="col-lg-4 col-md-6">
                <!-- small box -->
                @if ($leaveDetail->LeaveCode === 'L-001')
                    <div class="small-box bg-primary">
                @elseif ($leaveDetail->LeaveCode === 'L-002')
                    <div class="small-box bg-danger">
                @elseif ($leaveDetail->LeaveCode === 'L-003')
                    <div class="small-box bg-warning">
                @elseif ($leaveDetail->LeaveCode === 'L-004')
                    <div class="small-box  bg-danger">
                @elseif ($leaveDetail->LeaveCode === 'L-005')
                    <div class="small-box bg-warning">
                @elseif ($leaveDetail->LeaveCode === 'L-006')
                    <div class="small-box bg-primary">
                @elseif ($leaveDetail->LeaveCode === 'L-007')
                    <div class="small-box bg-primary">
                @elseif ($leaveDetail->LeaveCode === 'L-008')
                    <div class="small-box bg-danger">
                @elseif ($leaveDetail->LeaveCode === 'L-009')
                    <div class="small-box bg-warning">
                @endif
                    <div class="inner">
                        <div class="leave-detail leave-type-{{ substr($leaveDetail->LeaveCode, -1) }}">
                            <!-- Display leave details -->
                            <!--<p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>-->
                           <h5> {{ $leaveDetail->LeaveDesc }}</h5>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('leave') }}" class="small-box-footer">Apply Leave <i class="fas fa-arrow-circle-right"></i></a>
                </div>
         
</section>
@endsection
