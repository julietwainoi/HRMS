@extends('auth.Layouts.app')
@section('content')
<div class="card" style="margin-left: 50px; margin-right: 50px; margin-top: 100px; width: 800px;">
    <div class="col-sm-12 card-header bg-dark text-center font-weight-bold">
        Register
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
     <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group ">
                   <input id="IDNo" type="text" class="form-control @error('IDNo') is-invalid @enderror" name="IDNo"
                        value="{{ old('IDNo') }}" required autocomplete="id" autofocus placeholder="ID NO">
                    @error('IDNo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div><br>
         
                <div class="input-group ">
            
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div><br>
                <div class="input-group ">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div><br>
                <div class="input-group ">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div><br>
                <div class="input-group ">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary ">Register</button>
                    </div>
                </div><br>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->


@endsection