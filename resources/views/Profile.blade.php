@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Profile</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">

                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                        @foreach ($data as $item)
                         <p>IDNO:{{ $item->StaffNo }}</p>
                          <p>PhoneNumber:{{ $item->MobilePhone }}</p>
                          <p>MSN:{{$item-> HREMP_MSN}}</p>
                          <p>Name: {{ $item->Names }}</p>
                          <p> FirtsName:{{ $item->FirstName }}</p>
                          <p>MiddleName:{{ $item->MiddleName }}</p>
                          <p>lastName{{ $item->LastName}}</p>
                          <p>JobCode:{{ $item-> JobCode}}</P>
                       @endforeach

                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
</section>



@endsection