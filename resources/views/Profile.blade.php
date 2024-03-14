@extends('layouts.master')

@section('content')
<h1>User Profile</h1>
    
    @if(isset($name) && isset($email))
        <p>Name: {{ $name }}</p>
        <p>Email: {{ $email }}</p>
    @else
        <p>User not logged in.</p>
    @endif
@endsection
