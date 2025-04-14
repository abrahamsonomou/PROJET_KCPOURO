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
    <h1>Détails du partenaire</h1>

    <div class="mb-3">
        <strong>Titre:</strong> {{ $partenaire->nom }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> {{ $partenaire->description }}
    </div>

    <div class="mb-3">
        <strong>logo:</strong>
        @if ($partenaire->logo)
            <img src="{{ asset('storage/' . $partenaire->logo) }}" width="200">
        @else
            <p>Aucune logo</p>
        @endif
    </div>

    <div class="mb-3">
        <strong>Ordre:</strong> {{ $partenaire->ordre }}
    </div>

    <div class="mb-3">
        <strong>Active:</strong> {{ $partenaire->active ? 'Oui' : 'Non' }}
    </div>

    <a href="{{ route('admin.partenaires.list') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
