@extends('layouts.app')
@section('title', 'Registration')
@section('content')
    <div class="container">
        <form actions= "{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="name" class="form-control" name="name"required>
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="username" class="form-control" name="username"required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password"required>
            </div>
            <div class="mb-3">
                <div class="d-flex flex-column align-items-center">
                    <button type="submit" class="btn btn-primary" style="width: 100px">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
