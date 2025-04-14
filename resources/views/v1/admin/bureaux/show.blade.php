@extends('v1.admin.base')
@section('title', 'Show Bureau')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Bureau Details</h1>

    <div class="form-group">
        <label for="ville">Ville</label>
        <p>{{ $bureau->ville }}</p>
    </div>
    <div class="form-group">
        <label for="adresse">Address</label>
        <p>{{ $bureau->adresse }}</p>
    </div>
    <div class="form-group">
        <label for="telephone">Telephone</label>
        <p>{{ $bureau->telephone }}</p>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <p>{{ $bureau->email }}</p>
    </div>
    <div class="form-group">
        <label for="active">Active</label>
        <p>{{ $bureau->active ? 'Yes' : 'No' }}</p>
    </div>

    <a href="{{ route('admin.bureaux.edit', $bureau->id) }}" class="btn btn-primary">Edit</a>
</div>
@endsection
