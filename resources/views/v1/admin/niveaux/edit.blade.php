@extends('v1.admin.base')
@section('title', 'Niveaux')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container mt-4">
    <h1>Mise à jour du Niveau</h1>

    <form action="{{ route('admin.niveaux.update', $niveau->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $niveau->nom) }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="active">Active</label>
            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.niveaux.list') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
