@extends('admin.main.admin_main')

@section('title')
    Admin registration
@endsection

@section('pagetitel')
    Admin register
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <h2 class="mt-5">Signup Form</h2>
        <form action="{{ route('adminmod.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control @error('email'){{ 'is-invalid' }}@enderror" id="email"
                    name="email" placeholder="Enter email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username'){{ 'is-invalid' }}@enderror" id="username"
                    name="username" placeholder="Enter username" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control  @error('password'){{ 'is-invalid' }}@enderror" id="password"
                    name="password" placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control  @error('password_confirmation'){{ 'is-invalid' }}@enderror"
                    id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group"> 
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" name="level">
                    <option value="">Select role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select> </div>
            <button type="submit" name="register" class="btn btn-primary mt-3">Submit</button>
        </form>
    @endsection

    @section('path')
        {{ $path }}
    @endsection
