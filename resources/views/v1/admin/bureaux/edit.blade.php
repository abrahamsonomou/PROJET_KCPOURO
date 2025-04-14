@extends('v1.admin.base')
@section('title', 'Edit Bureau')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Edit Bureau</h1>

    <form action="{{ route('admin.bureaux.update', $bureau->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" value="{{ $bureau->ville }}" required>
        </div>
        <div class="form-group">
            <label for="adresse">Address</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $bureau->adresse }}">
        </div>
        <div class="form-group">
            <label for="telephone">Telephone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $bureau->telephone }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $bureau->email }}" required>
        </div>
        
        <div class="form-group">
            <label for="active">Active</label>
            <select name="active" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1" {{ $bureau->active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$bureau->active ? 'selected' : '' }}>No</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection