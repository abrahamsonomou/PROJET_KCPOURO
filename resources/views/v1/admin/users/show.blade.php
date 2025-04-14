@extends('v1.admin.base')
@section('title', 'User Details')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>User Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>First Name:</strong> {{ $user->first_name }}</p>
            <p class="card-text"><strong>Last Name:</strong> {{ $user->last_name }}</p>
            <p class="card-text"><strong>Telephone:</strong> {{ $user->telephone }}</p>
            <p class="card-text"><strong>Date of Birth:</strong> {{ $user->date_naissance }}</p>
            <p class="card-text"><strong>Address 1:</strong> {{ $user->adresse1 }}</p>
            <p class="card-text"><strong>Address 2:</strong> {{ $user->adresse2 }}</p>
            <p class="card-text"><strong>Country:</strong> {{ $user->pays->nom }}</p>
            <p class="card-text"><strong>City:</strong> {{ $user->ville->nom }}</p>
            <p class="card-text"><strong>Bio:</strong> {{ $user->bio }}</p>
            <p class="card-text"><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            <p class="card-text"><strong>Is Admin?</strong> {{ $user->is_admin ? 'Yes' : 'No' }}</p>
            <p class="card-text"><strong>Approved Courses?</strong> {{ $user->approuve_cours ? 'Yes' : 'No' }}</p>
            <p class="card-text"><strong>Active:</strong> {{ $user->is_active ? 'Yes' : 'No' }}</p>
            
            @if($user->avatar)
                <div class="text-center">
                    <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="User Avatar" class="img-fluid rounded" style="max-width: 150px;">
                </div>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning mt-3">Edit</a>
    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
    </form>
</div>
@endsection