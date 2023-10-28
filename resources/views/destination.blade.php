@extends('layouts.app')
@section('title', 'Destination')
@section('content')
    <div class="card mt-5 mb-5 p-5 shadow-sm">
        <div class="card-header bg-white d-flex flex-column gap-3 align-items-center">
            <h1 class=" fw-bold text-primary">DESTINATION</h1>
        </div>

        <div class="card-body d-flex flex-column gap-3 align-items-center mt-5 mb-5">
            <h4 class=" fw-bold text-primary mb-5">
                Select your Destination
            </h4>

            <form class="d-flex flex-column gap-5 w-100" action="{{ route('destination.post', ['selected_seat' => $selectedSeat]) }}" method="POST">
                <div class="d-flex flex-row gap-3 align-items-center justify-content-between">
                    <label class="h5 fw-bold form-label text-primary ">
                        SEAT
                    </label>
                    <input type="text" class="form-control w-50" name="selected_seat" value="{{ $selectedSeat }}">
                </div>
                @csrf
                <div class="h5 fw-bold form-label text-primary " >
                    <div class="d-flex flex-row gap-3 align-items-center justify-content-between">
                        <label class="form-label">
                            FROM : MUNICIPALITY
                        </label>
                        <!--<hr class="separator border border-2 border-primary w-100">-->
                        <select class="form-control w-50" name="FROM_Municipality" id="municipalitySelect">
                            @foreach ($from_municipalities as $municipality1)
                                <option value="{{ $municipality1->FROM_Municipality }}">{{ $municipality1->FROM_Municipality }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="current_location" id="currentLocation">
                    </div>
                </div>
                <div class="h5 fw-bold form-label text-primary ">
                    <div class="d-flex flex-row gap-3 align-items-center justify-content-between">
                        <label class="form-label">
                            TO : MUNICIPALITY
                        </label>
                        <!--<hr class="separator border border-2 border-primary w-100">-->
                        <select class="form-control w-50" name="TO_Municipality" id="toMunicipalitySelect" onchange="updateBarangayOptions()">
                            @foreach ($to_municipalities as $municipality2)
                                <option value="{{ $municipality2->TO_Municipality }}">{{ $municipality2->TO_Municipality }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="h5 fw-bold form-label text-primary " >
                    <div class="d-flex flex-row gap-3 align-items-center justify-content-between">
                        <label class="form-label">
                            TO : BARANGAY
                        </label>
                        <!--<hr class="separator border border-2 border-primary w-100">-->
                        <select class="form-control w-50" name="Barangay" id="barangaySelect">
                            <!-- This select will be populated dynamically using JavaScript -->
                        </select>
                    </div>
                </div>
                <div class="h5 fw-bold form-label text-primary ">
                    <div class="d-flex flex-row gap-3 align-items-center justify-content-between">
                        <label class="form-label">
                            DESIRED GET OFF
                        </label>
                        <!--<hr class="separator border border-2 border-primary w-100">-->
                        <select class="form-control w-50" name="Landmark" id="landmarkSelect">
                            <!-- This select will be populated dynamically using JavaScript -->
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
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

        <div class="modal fade" id="passcodeModal" tabindex="-1" role="dialog" aria-labelledby="passcodeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content  p-3">
                    <div class="modal-header">
                        <h5 class="modal-title" id="passcodeModalLabel">Enter Passcode</h5>
                    </div>
                    <div class="modal-body d-flex flex-column gap-3">
                        <div class="form-group">
                            <label for="modalMunicipality1" class="form-label">From Municipality:</label>
                            <span id="modalMunicipality1" class="form-control"></span>
                        </div>
                        <div class="form-group">
                            <label for="modalMunicipality2" class="form-label">To Municipality:</label>
                            <span id="modalMunicipality2" class="form-control"></span>
                        </div>
                        <div class="form-group">
                            <label for="modalBarangay" class="form-label">Barangay:</label>
                            <span id="modalBarangay" class="form-control"></span>
                        </div>
                        <div class="form-group">
                            <label for="passcodeInput">Passcode:</label>
                            <input type="password" class="form-control" id="passcodeInput">
                        </div>
                    </div>

                    <div class="modal-footer d-flex flex-column gap-1 ">
                        <button type="button" class="btn btn-primary border-3 w-100 " id="submitPasscode">Submit</button>
                        <button type="button" class="btn btn-outline-primary border-3 w-100" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

            // Populate barangays based on selected municipality
            @foreach ($barangays as $barangay)
                if ("{{ $barangay->TO_Municipality }}" === selectedMunicipalityId) {
                    var option = document.createElement('option');
                    option.text = "{{ $barangay->Barangay }}";
                    option.value = "{{ $barangay->Barangay }}";
                    barangaySelect.add(option);
                }
            @endforeach
        }
        updateBarangayOptions();
        // Call the function initially and when TO: MUNICIPALITY changes
        document.getElementById('toMunicipalitySelect').addEventListener('change', updateBarangayOptions);
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

            // Populate landmarks and retrieve latitude and longitude
            @foreach ($landmarks as $landmark)
            if ("{{ $landmark->TO_Municipality }}" === selectedMunicipalityId && "{{ $landmark->Barangay }}" === selectedBarangay) {
                var option = document.createElement('option');
                option.text = "{{ $landmark->Landmark }}";
                option.value = "{{ $landmark->Landmark }}";
                landmarkSelect.add(option);
                // Store longitude and latitude in localStorage
                localStorage.setItem("longitude", "{{ $landmark->longitude }}");
                localStorage.setItem("latitude", "{{ $landmark->latitude }}");
            }
            @endforeach
        }

        // Call the function initially and when TO: MUNICIPALITY or TO: BARANGAY changes
        document.getElementById('toMunicipalitySelect').addEventListener('change', updateLandmarkOptions);
        document.getElementById('barangaySelect').addEventListener('change', updateLandmarkOptions);

        document.getElementById('landmarkSelect').addEventListener('change', function () {
            var selectedLandmark = document.getElementById('landmarkSelect').value;
            var landmarkData = @json($landmarks);
            // Find the selected landmark data and update the latitude and longitude fields
            for (var i = 0; i < landmarkData.length; i++) {
                if (landmarkData[i].Landmark === selectedLandmark) {
                    // Update localStorage with the selected longitude and latitude
                    localStorage.setItem("longitude", landmarkData[i].longitude);
                    localStorage.setItem("latitude", landmarkData[i].latitude);
                    break;
                }
            }
        });

        // Initialize the landmark options
        updateLandmarkOptions();
    </script>


    <script>
        var expectedPasscode = "123";

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('form').addEventListener('submit', function (e) {
                e.preventDefault();

                var municipality1 = document.querySelector('select[name="FROM_Municipality"]').value;
                var municipality2 = document.querySelector('select[name="TO_Municipality"]').value;
                var barangay = document.querySelector('select[name="Barangay"]').value;

                // Set the values in the modal
                document.getElementById('modalMunicipality1').textContent = municipality1;
                document.getElementById('modalMunicipality2').textContent = municipality2;
                document.getElementById('modalBarangay').textContent = barangay;

                // Show the modal
                $('#passcodeModal').modal('show');
            });

            document.getElementById('submitPasscode').addEventListener('click', function () {
                var passcodeInput = document.getElementById('passcodeInput').value;

                if (passcodeInput === expectedPasscode) {
                    // Get latitude and longitude from localStorage
                    var latitude = localStorage.getItem("latitude");
                    var longitude = localStorage.getItem("longitude");

                    // Add the latitude and longitude values to the form data
                    var form = document.querySelector('form');
                    var latitudeInput = document.createElement('input');
                    latitudeInput.type = 'hidden';
                    latitudeInput.name = 'latitude';
                    latitudeInput.value = latitude;

                    var longitudeInput = document.createElement('input');
                    longitudeInput.type = 'hidden';
                    longitudeInput.name = 'longitude';
                    longitudeInput.value = longitude;

                    form.appendChild(latitudeInput);
                    form.appendChild(longitudeInput);

                    // Submit the form
                    $('#passcodeModal').modal('hide');
                    form.submit();
                } else {
                    alert("Incorrect passcode. Submission canceled.");
                }
            });
        });
    </script>

@endsection
