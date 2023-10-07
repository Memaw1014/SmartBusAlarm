@extends('layouts.app')
@section('title', 'Confirmation')
@section('content')
    <div class="container">
        <form actions= "{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Destination Information</div>
                        <div class="card-body">
                            <p>{{ $message1 }}</p>
                            <p>{{ $message2 }}</p>
                            <a href="{{ route('map') }}" class="btn btn-primary">View Map</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
