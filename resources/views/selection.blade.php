@extends('layouts.app')
@section('title', 'Selection')
@section('content')
    <div class="card mt-5 mb-5 p-5 shadow-sm">
        <div class="card-header bg-white d-flex flex-column gap-3 align-items-center">
            <h1 class=" fw-bold text-primary">
                SELECTION
            </h1>

            <!-- DIA RA BAY -->
            <audio id="audioPlayer" src="assets/sfx/arrive.wav" autoplay></audio>
            <div>
                <button id="playButton" class="btn btn-primary fw-bolder p-3">Play Audio</button>
                <button id="stopButton" class="btn btn-danger fw-bolder p-3">Stop Audio</button>
            </div>
        </div>

        <div class="card-body d-flex flex-column gap-3 align-items-center mt-5 mb-5 ">
            <h4 class=" fw-bold text-primary mb-5">
                Select your Seat Number
            </h4>
            <form class="d-flex flex-row gap-3 w-100 justify-content-around " action="{{ route('selection.post') }}" method="POST">
                @csrf
                    <button type="submit" id = "seat1Button" name="selected_seat" value="SEAT NO. 1" class="btn btn-primary w-50 fw-bolder p-3 " >
                        SEAT NO. 1
                    </button>
                    <div class="separator border border-2 border-primary "></div>
                    <button type="submit" id = "seat2Button" name="selected_seat" value="SEAT NO. 2" class="btn btn-primary w-50 fw-bolder p-3 " >
                        SEAT NO. 2
                    </button>
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
        // Check Local Storage for values of Seat No. 1 and Seat No. 2
        var seat1Value = localStorage.getItem("SEAT NO. 1");
        var seat2Value = localStorage.getItem("SEAT NO. 2");

        // Get references to the buttons
        var seat1Button = document.getElementById("seat1Button");
        var seat2Button = document.getElementById("seat2Button");

        var playButton = document.getElementById("playButton");
        var stopButton = document.getElementById("stopButton");
        var audioPlayer = document.getElementById("audioPlayer");

        // Add a click event handler to the play button
        playButton.addEventListener("click", function() {
            audioPlayer.play();
        });

        // Add a click event handler to the stop button
        stopButton.addEventListener("click", function() {
            audioPlayer.pause();
            audioPlayer.currentTime = 0; // Reset the audio to the beginning
        });

        // Disable buttons if Local Storage values are not empty
        if (seat1Value && seat1Value.trim() !== "") {
            seat1Button.disabled = true;
        }

        if (seat2Value && seat2Value.trim() !== "") {
            seat2Button.disabled = true;
        }
    </script>
@endsection
