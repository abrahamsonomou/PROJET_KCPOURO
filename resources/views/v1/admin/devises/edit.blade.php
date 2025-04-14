@extends('v1.admin.base')
@section('title', 'Devises')
@section('isActive16')
active
@endsection
@section('isActive19')
active
@endsection
@section('content')
<div class="container">
    <h1>Edit Devise</h1>

    <form action="{{ route('admin.devises.update', $devise->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code_iso">Code ISO</label>
            <input type="text" name="code_iso" id="code_iso" class="form-control" value="{{ old('code_iso', $devise->code_iso) }}" required>
        </div>
        <div class="form-group">
            <label for="symbole">Symbole</label>
            <input type="text" name="symbole" id="symbole" class="form-control" value="{{ old('symbole', $devise->symbole) }}" required>
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $devise->nom) }}" required>
        </div>
        <div class="form-group">
            <label for="nom_court">Nom Court</label>
            <input type="text" name="nom_court" id="nom_court" class="form-control" value="{{ old('nom_court', $devise->nom_court) }}" required>
        </div>
        <div class="form-group">
            <label for="active">Active</label>
            <input type="checkbox" name="active" id="active" class="form-sweet" {{ old('active', $devise->active) ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
