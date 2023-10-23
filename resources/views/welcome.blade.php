@extends('layouts.app')
@section('content')
    <div class="card mt-5 mb-5 p-5 shadow-sm">
        <div class="card-header bg-white d-flex flex-column gap-3 align-items-center">
            <h1 class=" fw-bold text-primary">
                WELCOME
            </h1>
        </div>

        <div class="card-body d-flex flex-column gap-3 align-items-center mt-5 mb-5 ">
            <h4 class=" fw-bold text-primary mb-5">
                Let's get Started!
            </h4>
            <form class="d-flex flex-column gap-3 w-100">
                <a href="{{ route('selection') }}" class="btn btn-primary border-3 fw-bold">
                    Start Now
                </a>
                <a href="{{ route('instructions') }}" class="btn btn-outline-primary border-3 fw-bold">
                    Learn How
                </a>
            </form>
        </div>

        <div class="card-footer bg-white">
            <div class=" d-flex flex-row justify-content-between mt-3 ">
                <p>
                    Copyright 2023
                </p>
                <p>
                    Smart Alarm Bus System
                </p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('startNowButton').addEventListener('click', function() {
            window.location.href = "{{ route('selection') }}";
        });
    </script>
@endsection
