@extends('layouts.layout')
@section('content')
<h2>Create New User</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ url('/users/store'); }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ old('name') }}">
        @error('name')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname" placeholder="" value="{{ old('surname') }}">
        @error('surname')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="" value="{{ old('email') }}">
        @error('email')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="" value="">
        @error('password')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="" value="">
        @error('confirm_password')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Country</label>
        <select class="form-select" name="country">
            <option value="">--Select--</option>
            @foreach ($countries as $country)
            <option @selected(old('country')==$country->id) value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
        @error('country')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{ old('phone') }}">
        @error('phone')<label class="error">{{ $message }}</label>@enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Gender</label>
        <select class="form-select" name="gender">
            <option @selected(old('gender')==1) value="1">Male</option>
            <option @selected(old('gender')==2) value="2">Female</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Profile Picture <small>(optional)</small></label>
        <input type="file" name="image" id="image" class="form-control" accept="image/png,image/jpeg">
    </div>
    <div class="mb-3">
        <a href="{{ url('/users'); }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
        <button style="margin-left: 50px;" type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection