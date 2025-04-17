@extends('layouts.layout')
@section('content')
<h2>Update User</h2>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('users.update', $user->getId()) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $user->getName() }}">
        @error('name')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname" placeholder="" value="{{ $user->getSurName() }}">
        @error('surname')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="" value="{{ $user->getEmail() }}">
        @error('email')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Country</label>
        <select class="form-select" name="country">
            <option value="">--Select--</option>
            @foreach ($countries as $country)
            <option @selected($user->getCountryId()==$country->id) value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach

        </select>
        @error('country')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ $user->getPhone() }}">
        @error('phone')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Gender</label>
        <select class="form-select" name="gender">
            <option value="1" @selected($user->getGender()==1) >Male</option>
            <option value="2" @selected($user->getGender()==2)>Female</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Profile Picture <small>(optional)</small></label>
        @if ($user->getProfilePicture())
        <div class="col-md-4 mb-3">
            <img width="200px" src="{{ asset('storage/' . $user->getProfilePicture()) }}" alt="ProfilePicture" class="">
        </div>
        @endif
        <input type="file" name="image" id="image" class="form-control" accept="image/png,image/jpeg">
    </div>
    <div class="mb-3">

        <a href="{{ url('/users'); }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
        <button style="margin-left: 50px;" type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection