@extends('layouts.app')
@section('title', 'Admin')
@section('content')
    <div class="container">
        <form action= "{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <label class="form-label" style="font-size: 50px;">ADMIN</label>
            </div>

            <div class="mb-3">
                <div class="d-flex flex-column align-items-center">
                    <label class="form-label">Username</label>
                    <input type="username" class="form-control" name="username"required>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex flex-column align-items-center">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password"required>
                </div>
            </div>
            <div class="mb-3">
                <div class="d-flex flex-column align-items-center">
                    <button type="submit" class="btn btn-primary" style="width: 100px">Submit</button>
                </div>
            </div>
        </form>

        <!-- Add the registration button to redirect to the registration page -->
        <div class="d-flex justify-content-center mt-3">
            <a href="http://127.0.0.1:8000/registration" class="btn btn-secondary">Register Driver</a>
        </div>
    </div>
@endsection
