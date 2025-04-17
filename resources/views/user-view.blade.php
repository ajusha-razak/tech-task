@extends('layouts.layout')
@section('content')

<h2>View User</h2>

<div class="card mb-3" style="max-width: 600px;">
    <div class="row g-0">
        @if ($user->getProfilePicture())
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $user->getProfilePicture()) }}" class="img-fluid rounded-start" alt="...">
        </div>
        @endif
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $user->getName() }} {{ $user->getSurName() }}</h5>
                <p class="card-text">Email ID : {{ $user->getEmail() }}</p>
                <p class="card-text">Country : {{ $user->getCountryName() }}</p>
                <p class="card-text">Phone : {{ $user->getPhone() }}</p>
                <p class="card-text">Gender : {{ $user->getGender() == 1 ? 'Male' : 'Female' }}</p>

            </div>
        </div>
    </div>
</div>


<div class="mb-3">
    <a href="{{ url('/users'); }}"><button type="button" class="btn btn-primary">Back</button></a>
</div>

@endsection