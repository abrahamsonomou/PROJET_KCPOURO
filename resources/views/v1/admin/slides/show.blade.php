@extends('v1.admin.base')
@section('title', 'slides')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Détails du Slide</h1>

    <div class="mb-3">
        <strong>Titre:</strong> {{ $slide->titre }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> {{ $slide->description }}
    </div>

    <div class="mb-3">
        <strong>Image:</strong>
        @if ($slide->image)
            <img src="{{ asset('storage/' . $slide->image) }}" width="200">
        @else
            <p>Aucune image</p>
        @endif
    </div>

    <div class="mb-3">
        <strong>Ordre:</strong> {{ $slide->ordre }}
    </div>

    <div class="mb-3">
        <strong>Active:</strong> {{ $slide->active ? 'Oui' : 'Non' }}
    </div>

    <a href="{{ route('admin.slides.list') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
