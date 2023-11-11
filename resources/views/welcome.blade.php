@extends('layouts.app')
@section('content')
    <div class="card mt-5 mb-5 p-5 shadow-sm">
        <div class="card-header bg-white d-flex flex-column gap-3 align-items-center">
            <h1 class="fw-bold text-primary">
                WELCOME
            </h1>
        </div>

        <div class="card-body d-flex flex-column gap-3 align-items-center mt-5 mb-5 ">
            <h4 class="fw-bold text-primary mb-5">
                Let's get Started!
            </h4>
            <form class="d-flex flex-column gap-3 w-100" method="POST" action="{{ route('check.rfid') }}">
                @csrf
                <input type="password" name="rfid_password" placeholder="Scan RFID Here" id="rfid_password">
                <button id="startButton" type="submit" class="btn btn-primary border-3 fw-bold"hidden>
                    Start Now
                </button>
            </form>

            <!-- Add the admin button to redirect to the admin login page -->
        </div>

        <div class="card-footer bg-white">
            <div class="d-flex flex-row justify-content-between mt-3">
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
        document.getElementById("startButton").addEventListener("click", function () {
            var rfidPassword = document.getElementById("rfid_password").value;
            localStorage.setItem("passcodeUsed", rfidPassword);
        });
    </script>
@endsection
