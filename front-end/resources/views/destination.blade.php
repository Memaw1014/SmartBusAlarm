@extends('layouts.app')
@section('title', 'Destination')
@section('content')
    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 50vh;">
        <div style="width: 300px;">
            <label class="form-label" style="font-size: 50px;">WELCOME</label>
            <div class="mb-3 text-center">
                <h2 class="text-center">Select Your Destination</h2>
            </div>
            <form action="{{ route('destination.post') }}" method="POST">
                @csrf
                <div class="mb-3 justify-content-center align-items-center">
                    <label class="form-label" style="font-size: 20px; ">SEAT NO. 1</label>
                </div>
                <div class="mb-3">
                    <div class="d-flex flex-column align-items-center">
                        <label class="form-label">MUNICIPALITY</label>
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
                document.addEventListener('DOMContentLoaded', function () {
                    document.querySelector('form').addEventListener('submit', function (e) {
                        e.preventDefault();
                        
                        var municipality = document.querySelector('select[name="Municipality"]').value;
                        var barangay = document.querySelector('select[name="Barangay"]').value;
                        var message = 'Municipality: ' + municipality + '\nBarangay: ' + barangay;

                        if (confirm(message)) {
                            this.submit();
                        }
                    });
                });
            </script>
        </div>
    </div>
@endsection
