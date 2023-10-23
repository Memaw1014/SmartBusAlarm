@extends('layouts.app')
@section('title', 'Selection')
@section('content')
    <div class="card mt-5 mb-5 p-5 shadow-sm">
        <div class="card-header bg-white d-flex flex-column gap-3 align-items-center">
            <h1 class=" fw-bold text-primary">
                SELECTION
            </h1>
        </div>

        <div class="card-body d-flex flex-column gap-3 align-items-center mt-5 mb-5 ">
            <h4 class=" fw-bold text-primary mb-5">
                Select your Seat Number
            </h4>
            <form class="d-flex flex-row gap-3 w-100 justify-content-around " action="{{ route('selection.post') }}" method="POST">
                @csrf
                    <button type="submit" name="selected_seat" value="SEAT NO. 1" class="btn btn-primary w-50 fw-bolder p-3 " >
                        SEAT NO. 1
                    </button>
                    <div class="separator border border-2 border-primary "></div>
                    <button type="submit" name="selected_seat" value="SEAT NO. 2" class="btn btn-primary w-50 fw-bolder p-3 " >
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
@endsection
