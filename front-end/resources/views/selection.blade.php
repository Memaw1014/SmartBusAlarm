@extends('layout')
@section('title', 'Selection')
@section('content')
    <div class="container">
    <form action="{{ route('selection.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
        @csrf
        <div class="mb-3 d-flex justify-content-center align-items-center">
            <label class="form-label" style="font-size: 50px;">WELCOME</label>
        </div>
        
        <div class="mb-3 d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary" name="seat_number" value="Seat No. 1" style="width: 100px">Seat No. 1</button>
            <hr class="my-0 mx-2" style="height: 20px; width: 170px;">
            <button type="submit" class="btn btn-primary" name="seat_number" value="Seat No. 2" style="width: 100px">Seat No. 2</button>
        </div>
    </form>

    </div>
@endsection