@extends('layouts.app')
@section('title', 'Destination')
@section('content')
    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 60vh;">
        <div style="width: 700px;">
        <div class="mb-3 d-flex justify-content-center align-items-center">
            <label class="form-label" style="font-size: 40px;">SELECT YOUR DESTINATION</label>
        </div>
            <form action="{{ route('destination.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="d-flex flex-column align-items-center">
                        <label class="form-label">FROM: MUNICIPALITY</label>
                        <select class="form-select" name="Municipality" id="municipalitySelect">
                            @foreach ($municipalities as $municipality)
                                <option value="{{ $municipality->Municipality }}">{{ $municipality->Municipality }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="current_location" id="currentLocation">
                        
                        <label class="form-label">TO: MUNICIPALITY</label>
                        <select class="form-select" name="Municipality">
                            @foreach ($municipalities as $municipality)
                                <option value="{{ $municipality->Municipality }}">{{ $municipality->Municipality }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex flex-column align-items-center">
                        <label class="form-label">BARANGAY</label>
                        <select class="form-select" name="Barangay">
                            @foreach ($barangays as $barangay)
                                <option value="{{ $barangay->Barangay }}">{{ $barangay->Barangay }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary" style="width: 110px">Submit</button>
                </div>
            </form>

            <script>
                // Define your expected passcode here
                var expectedPasscode = "0012583248"; 

                document.addEventListener('DOMContentLoaded', function () {
                    document.querySelector('form').addEventListener('submit', function (e) {
                        e.preventDefault();

                        var municipality = document.querySelector('select[name="Municipality"]').value;
                        var barangay = document.querySelector('select[name="Barangay"]').value;
                        var message = 'Municipality: ' + municipality + '\nBarangay: ' + barangay + "\nEnter Passcode";
                        var passcode = prompt(message, );// Empty string for default input
                    
                        if (passcode !== null) {
                            if (passcode === expectedPasscode) {
                                this.submit();
                            } else {
                                alert("Incorrect passcode. Submission canceled.");
                            }
                        }
                    });
                });
            </script>
        </div>
    </div>
@endsection
