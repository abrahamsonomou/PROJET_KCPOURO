@extends('v1.admin.base')
@section('title', 'Villes')
@section('isActive16')
active
@endsection
@section('isActive18')
active
@endsection
@section('content')
<div class="container mt-4">
    <h2>Ajouter une ville</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.villes.store') }}">
        @csrf

        <div class="mb-3">
            <label for="pays_id" class="form-label">Pays</label>
            <select class="form-control" name="pays_id" required>
                <option value="">-- Sélectionnez un pays --</option>
                @foreach($pays as $p)
                    <option value="{{ $p->id }}">{{ $p->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la ville</label>
            <input type="text" name="nom" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="active" value="1" checked>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.villes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
