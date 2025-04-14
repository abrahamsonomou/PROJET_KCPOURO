@extends('v1.admin.base')
@section('title', 'services')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Détails du service</h1>

    <div class="mb-3">
        <strong>Titre:</strong> {{ $service->titre }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> {{ $service->description }}
    </div>

    <div class="mb-3">
        <strong>Image:</strong>
        @if ($service->image)
            <img src="{{ asset('storage/' . $service->image) }}" width="200">
        @else
            <p>Aucune image</p>
        @endif
    </div>

    <div class="mb-3">
        <strong>Ordre:</strong> {{ $service->ordre }}
    </div>

    <div class="mb-3">
        <strong>Active:</strong> {{ $service->active ? 'Oui' : 'Non' }}
    </div>

    <a href="{{ route('admin.services.list') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
