@extends('layout')
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
                    <input type="email" class="form-control" name="email">
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex flex-column align-items-center">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password"> 
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100px">Submit</button>
        </form>
    </div>
@endsection