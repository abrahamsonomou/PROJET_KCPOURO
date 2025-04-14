@extends('v1.admin.base')
@section('title', 'partenaires')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Modifier le partenaire</h1>

    <form action="{{ route('admin.partenaires.update', $partenaire->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $partenaire->nom }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $partenaire->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">logo</label>
            <input type="file" name="logo" class="form-control">
            @if ($partenaire->logo)
                <img src="{{ asset('storage/' . $partenaire->logo) }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Ordre</label>
            <input type="number" name="ordre" class="form-control" value="{{ $partenaire->ordre }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Active</label>
            <select name="active" class="form-control">
                <option value="1" {{ $partenaire->active ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ !$partenaire->active ? 'selected' : '' }}>Non</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>
@endsection
