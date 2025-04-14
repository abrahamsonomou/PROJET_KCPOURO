@extends('v1.admin.base')
@section('title', 'bureaux')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Create New Bureau</h1>

    <form action="{{ route('admin.bureaux.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="adresse">Address</label>
            <input type="text" name="adresse" id="adresse" class="form-control">
        </div>
        <div class="form-group">
            <label for="telephone">Telephone</label>
            <input type="text" name="telephone" id="telephone" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="active">Active</label>
            {{-- <input type="checkbox" name="active" id="active" checked> --}}
            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
