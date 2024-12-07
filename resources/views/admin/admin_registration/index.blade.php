@extends('admin.main.admin_main')

@section('title')
    Admin registration
@endsection

@section('pagetitel')
    Admin register
@endsection

@section('content')
    <div class="container">
        <h2 class="mt-5">Signup Form</h2>
        <form action="{{ route('adminmod.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control"id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control"id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <button type="submit" name="register" class="btn btn-primary mt-3">Submit</button>
        </form>
    @endsection

    @section('path')
        {{ $path }}
    @endsection
