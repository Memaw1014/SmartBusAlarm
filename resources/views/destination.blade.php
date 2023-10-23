@extends('layouts.app')
@section('title', 'Destination')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <div class="form-inline">
        <div class="container" style="display: flex; justify-content: center; align-items: center; height: 80vh;">
            <div style="width: 600px;">
                <div class="mb-3">
                    <div class="d-flex flex-column align-items-center">
                        <label class="form-label" style="font-size: 40px;">SELECT YOUR DESTINATION</label>
                    </div>
                </div>
                <form action="{{ route('destination.post', ['selected_seat' => $selectedSeat]) }}" method="POST">
                    <div class="mb-3" style="display: flex; justify-content: center; align-items: center; height: 10vh;">
                        <div style="width: 200px;">
                            <input type="text" class="form-control" name="selected_seat" value="{{ $selectedSeat }}">
                        </div>
                    </div>
                    @csrf
                    <div class="mb-3" style="display: flex; justify-content: center; align-items: center; height: 8vh;">
                            <div style="width: 300px;">
                                <label class="form-label">FROM: MUNICIPALITY</label>
                                <select class="form-control" name="FROM_Municipality" id="municipalitySelect">
                                    @foreach ($from_municipalities as $municipality1)
                                        <option value="{{ $municipality1->FROM_Municipality }}">{{ $municipality1->FROM_Municipality }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="current_location" id="currentLocation">

                    </div>
                    <div class="mb-3" style="display: flex; justify-content: center; align-items: center;">

                            <div style="width: 300px;">
                                <label class="form-label">TO: MUNICIPALITY</label>
                                <select class="form-control" name="TO_Municipality" id="toMunicipalitySelect" onchange="updateBarangayOptions()">
                                    @foreach ($to_municipalities as $municipality2)
                                        <option value="{{ $municipality2->TO_Municipality }}">{{ $municipality2->TO_Municipality }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="mb-3" style="display: flex; justify-content: center; align-items: center; height: 8vh;">
                            <div style="width: 300px;">
                                <label class="form-label">TO: BARANGAY</label>
                                <select class="form-control" name="Barangay" id="barangaySelect">
                                    <!-- This select will be populated dynamically using JavaScript -->
                                </select>
                            </div>
                    </div>
                    <div class="mb-3" style="display: flex; justify-content: center; align-items: center;">
                        <div class="d-flex flex-column align-items-center">
                            <div style="width: 300px;">
                                <label class="form-label">DESIRED GET OFF</label>
                                <select class="form-control" name="Landmark" id="landmarkSelect">
                                    <!-- This select will be populated dynamically using JavaScript -->
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
                    function updateBarangayOptions() {
                        var selectedMunicipalityId = document.getElementById('toMunicipalitySelect').value;
                        var barangaySelect = document.getElementById('barangaySelect');
                        while (barangaySelect.options.length > 0) {
                            barangaySelect.remove(0);
                        }
                        var defaultOption = document.createElement('option');
                        defaultOption.text = 'Select Barangay';
                        defaultOption.value = '';
                        barangaySelect.add(defaultOption);
                        @foreach ($barangays as $barangay)
                            @if ($barangay->TO_Municipality === 'Sogod')
                                if ("{{ $barangay->TO_Municipality }}" === selectedMunicipalityId) {
                                    var option = document.createElement('option');
                                    option.text = "{{ $barangay->Barangay }}";
                                    option.value = "{{ $barangay->Barangay }}";
                                    barangaySelect.add(option);
                                }
                            @endif
                            @if ($barangay->TO_Municipality === 'Bontoc')
                                if ("{{ $barangay->TO_Municipality }}" === selectedMunicipalityId) {
                                    var option = document.createElement('option');
                                    option.text = "{{ $barangay->Barangay }}";
                                    option.value = "{{ $barangay->Barangay }}";
                                    barangaySelect.add(option);
                                }
                            @endif
                            @if ($barangay->TO_Municipality === 'Tomas Oppus')
                                if ("{{ $barangay->TO_Municipality }}" === selectedMunicipalityId) {
                                    var option = document.createElement('option');
                                    option.text = "{{ $barangay->Barangay }}";
                                    option.value = "{{ $barangay->Barangay }}";
                                    barangaySelect.add(option);
                                }
                            @endif
                            @if ($barangay->TO_Municipality === 'Malitbog')
                                if ("{{ $barangay->TO_Municipality }}" === selectedMunicipalityId) {
                                    var option = document.createElement('option');
                                    option.text = "{{ $barangay->Barangay }}";
                                    option.value = "{{ $barangay->Barangay }}";
                                    barangaySelect.add(option);
                                }
                            @endif
                            @if ($barangay->TO_Municipality === 'Padre Burgos')
                                if ("{{ $barangay->TO_Municipality }}" === selectedMunicipalityId) {
                                    var option = document.createElement('option');
                                    option.text = "{{ $barangay->Barangay }}";
                                    option.value = "{{ $barangay->Barangay }}";
                                    barangaySelect.add(option);
                                }
                            @endif
                            @if ($barangay->TO_Municipality === 'Macrohon')
                                if ("{{ $barangay->TO_Municipality }}" === selectedMunicipalityId) {
                                    var option = document.createElement('option');
                                    option.text = "{{ $barangay->Barangay }}";
                                    option.value = "{{ $barangay->Barangay }}";
                                    barangaySelect.add(option);
                                }
                            @endif
                            @if ($barangay->TO_Municipality === 'Maasin')
                                if ("{{ $barangay->TO_Municipality }}" === selectedMunicipalityId) {
                                    var option = document.createElement('option');
                                    option.text = "{{ $barangay->Barangay }}";
                                    option.value = "{{ $barangay->Barangay }}";
                                    barangaySelect.add(option);
                                }
                            @endif
                        @endforeach
                    }
                    updateBarangayOptions();
                </script>
                <script>
                    function updateLandmarkOptions() {
                        var selectedMunicipalityId = document.getElementById('toMunicipalitySelect').value;
                        var selectedBarangay = document.getElementById('barangaySelect').value;
                        var landmarkSelect = document.getElementById('landmarkSelect');

                        while (landmarkSelect.options.length > 0) {
                            landmarkSelect.remove(0);
                        }

                        var defaultOption = document.createElement('option');
                        defaultOption.text = 'Select Landmark';
                        defaultOption.value = '';
                        landmarkSelect.add(defaultOption);

                        @foreach ($landmarks as $landmark)
                            if ("{{ $landmark->TO_Municipality }}" === selectedMunicipalityId && "{{ $landmark->Barangay }}" === selectedBarangay) {
                                var option = document.createElement('option');
                                option.text = "{{ $landmark->Landmark }}";
                                option.value = "{{ $landmark->Landmark }}";
                                landmarkSelect.add(option);
                            }
                        @endforeach
                    }

                    // Call the function initially and when Barangay changes
                    updateLandmarkOptions();
                    document.getElementById('toMunicipalitySelect').addEventListener('change', updateLandmarkOptions);
                    document.getElementById('barangaySelect').addEventListener('change', updateLandmarkOptions);
                </script>

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
    </div>
@endsection
