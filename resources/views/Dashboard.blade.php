
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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @foreach ($leaveDetails as $leaveDetail)
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @if ($leaveDetail->LeaveCode === 'L-001')
                <div class="small-box bg-info">
                    <div class="inner">
                        <div class="leave-detail leave-type-1">
                            <!-- Display leave details -->
                            <p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>
                            <p>Leave Description: {{ $leaveDetail->LeaveDesc }}</p>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @elseif ($leaveDetail->LeaveCode === 'L-002')
                <div class="small-box bg-success">
                    <div class="inner">
                        <div class="leave-detail leave-type-2">
                            <!-- Display leave details -->
                            <p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>
                            <p>Leave Description: {{ $leaveDetail->LeaveDesc }}</p>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @elseif ($leaveDetail->LeaveCode === 'L-003')
                <div class="small-box bg-warning">
                    <div class="inner">
                        <div class="leave-detail leave-type-3">
                            <!-- Display leave details -->
                            <p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>
                            <p>Leave Description: {{ $leaveDetail->LeaveDesc }}</p>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <!-- Another row for leave codes L-004 to L-006 -->
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @foreach ($leaveDetails as $leaveDetail)
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @if ($leaveDetail->LeaveCode === 'L-004')
                <div class="small-box bg-warning">
                    <div class="inner">
                        <div class="leave-detail leave-type-1">
                            <!-- Display leave details -->
                            <p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>
                            <p>Leave Description: {{ $leaveDetail->LeaveDesc }}</p>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @elseif ($leaveDetail->LeaveCode === 'L-005')
                <div class="small-box bg-success">
                    <div class="inner">
                        <div class="leave-detail leave-type-2">
                            <!-- Display leave details -->
                            <p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>
                            <p>Leave Description: {{ $leaveDetail->LeaveDesc }}</p>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @elseif ($leaveDetail->LeaveCode === 'L-006')
                <div class="small-box bg-warning">
                    <div class="inner">
                        <div class="leave-detail leave-type-3">
                            <!-- Display leave details -->
                            <p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>
                            <p>Leave Description: {{ $leaveDetail->LeaveDesc }}</p>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <!-- Another row for leave codes L-007 to L-009 -->
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @foreach ($leaveDetails as $leaveDetail)
            <div class="col-lg-3 col-6">
                <!-- small box -->
                @if ($leaveDetail->LeaveCode === 'L-007')
                <div class="small-box bg-info">
                    <div class="inner">
                        <div class="leave-detail leave-type-1">
                            <!-- Display leave details -->
                            <p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>
                            <p>Leave Description: {{ $leaveDetail->LeaveDesc }}</p>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @elseif ($leaveDetail->LeaveCode === 'L-008')
                <div class="small-box bg-success">
                    <div class="inner">
                        <div class="leave-detail leave-type-2">
                            <!-- Display leave details -->
                            <p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>
                            <p>Leave Description: {{ $leaveDetail->LeaveDesc }}</p>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @elseif ($leaveDetail->LeaveCode === 'L-009')
                <div class="small-box bg-warning">
                    <div class="inner">
                        <div class="leave-detail leave-type-3">
                            <!-- Display leave details -->
                            <p>Leave Code: {{ $leaveDetail->LeaveCode }}</p>
                            <p>Leave Description: {{ $leaveDetail->LeaveDesc }}</p>
                            <p>Leave Days: {{ $leaveDetail->LeaveDays }}</p>
                            <p>Remaining Days: {{ $leaveDetail->RemainingDays }}</p>
                        </div>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('leave')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
