@extends('layouts.app')
@section('title', 'Destination')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
            <div class="form-inline">
    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 80vh;">
        <div style="width: 600px;">
        <div class="mb-3" style="display: flex; justify-content: center; align-items: center; height: 10vh;">
            <label class="form-label" style="font-size: 40px;">SELECT YOUR DESTINATION</label>
        </div>
            <form action="{{ route('destination.post') }}" method="POST">
                @csrf
                <div class="mb-3" style="display: flex; justify-content: center; align-items: center; height: 30vh;">
                    <div class="d-flex flex-column align-items-center height: 30vh;">
                        <div style="width: 300px;">
                        <label class="form-label">FROM: MUNICIPALITY</label>
                        <select class="form-control" name="FROM_Municipality" id="municipalitySelect">
                            @foreach ($from_municipalities as $municipality1)
                                <option value="{{ $municipality1->FROM_Municipality }}">{{ $municipality1->FROM_Municipality }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="current_location" id="currentLocation">
                        <div>
                        </div>
                    <div class="mb-3" >
                        <div style="width: 350px;">
                        <div >
                            <label class="form-label">TO: MUNICIPALITY  </label>
                            <select class="form-control" name="TO_Municipality">
                                @foreach ($to_municipalities as $municipality2)
                                    <option value="{{ $municipality2->TO_Municipality }}">{{ $municipality2->TO_Municipality }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                    <div class="mb-3" >
                        <div style="width: 400px;">
                        <div >
                            <label class="form-label">TO: BARANGAY</label>
                            <select class="form-control" name="Barangay">
                                @foreach ($barangays as $barangay)
                                    <option value="{{ $barangay->Barangay }}">{{ $barangay->Barangay }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3" style="display: flex; justify-content: center; align-items: center; height: 10vh;">
                    <div class="d-flex flex-column align-items-center">
                    <button type="submit" class="btn btn-primary" style="width: 110px">Submit</button>
                    </div>
                </div>
            </form>
            <script>
                // Define your expected passcode here
                var expectedPasscode = "123"; 

                document.addEventListener('DOMContentLoaded', function () {
                    document.querySelector('form').addEventListener('submit', function (e) {
                        e.preventDefault();

                        var municipality1 = document.querySelector('select[name="FROM_Municipality"]').value;
                        var municipality2 = document.querySelector('select[name="TO_Municipality"]').value;
                        var barangay = document.querySelector('select[name="Barangay"]').value;
                        var message = 'From Municipality: ' + municipality1 + '\nTo Municipality: ' + municipality2 + '\nBarangay: ' + barangay + "\nEnter Passcode";
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