@extends('layout')
@section('title', 'Selection')
@section('content')
<div class="container" style="display: flex; justify-content: center; align-items: center; height: 70vh;">
    <div style="width: 300px;">
    <div class="mb-3 d-flex justify-content-center align-items-center">
        <label class="form-label" style="font-size: 40px;">WELCOME</label>
    </div>
    <form action="{{ route('selection.post') }}" method="POST" >
        @csrf
        <div class="mb-3 d-flex justify-content-center align-items-center">
            <label class="form-label" style="font-size: 25px;">Select Your Seat No.</label>
        </div>

        <div class="mb-3">
            <div class="d-flex align-items-center justify-content-center">
                <button type="submit" name="selected_seat" value="seat1" class="btn btn-primary" style="width: 120px">
                    SEAT NO. 1
                </button>
                <span class="separator mx-2">|</span>
                <button type="submit" name="selected_seat" value="seat2" class="btn btn-primary" style="width: 120px">
                    SEAT NO. 2
                </button>
            </div>
        </div>
    </form>
</div>
@endsection 