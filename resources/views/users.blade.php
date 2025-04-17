@extends('layouts.layout')
@section('content')
<h2>User List</h2>
<div class="float-end"><a href="{{ url('/users/create'); }}"><button type="button" class="btn btn-primary">Create new user</button></a></div><br />
@if (session('status'))
<div class="alert alert-success" style="margin-top: 25px;">
    {{ session('status') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger" style="margin-top: 25px;">
    {{ session('error') }}
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($users->isNotEmpty())
        @foreach ($users as $user)
        <tr>
            <th scope="col">{{ $user->id }}</th>
            <th scope="col">{{ $user->name }} {{ $user->surname }}</th>
            <th scope="col">{{ $user->email }}</th>
            <th scope="col">{{ $user->country_name }}</th>
            <th scope="col">{{ $user->phone }}</th>
            <th scope="col">
                <a href="{{ route('users.view', $user->id) }}"><button type="button" class="btn btn-link">View</button></a>
                <a href="{{ route('users.edit', $user->id) }}"><button type="button" class="btn btn-link">Edit</button></a>
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </th>
        </tr>
        @endforeach

        @else
        <tr>
            <th colspan="6">No records found</th>
        </tr>
        @endif

    </tbody>
</table>

{{ $users->onEachSide(1)->links() }}
@endsection