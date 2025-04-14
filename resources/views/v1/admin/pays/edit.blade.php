@extends('v1.admin.base')
@section('title', 'Pays')
@section('isActive16')
active
@endsection
@section('isActive17')
active
@endsection
@section('content')
<div class="container">
    <h1>Edit Pays</h1>

    <form action="{{ route('admin.pays.update', $pays->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $pays->nom) }}" required>
        </div>
        <div class="form-group">
            <label for="code_iso">Code ISO</label>
            <input type="text" name="code_iso" id="code_iso" class="form-control" value="{{ old('code_iso', $pays->code_iso) }}">
        </div>
        <div class="form-group">
            <label for="indicatif">Indicatif</label>
            <input type="text" name="indicatif" id="indicatif" class="form-control" value="{{ old('indicatif', $pays->indicatif) }}">
        </div>
        <div class="form-group">
            <label for="nationnalite">Nationalité</label>
            <input type="text" name="nationnalite" id="nationnalite" class="form-control" value="{{ old('nationnalite', $pays->nationnalite) }}">
        </div>
        <div class="form-group">
            <label for="active">Active</label>
            <input type="checkbox" name="active" id="active" class="form-sweet" {{ old('active', $pays->active) ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
