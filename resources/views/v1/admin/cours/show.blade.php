@extends('v1.admin.base')
@section('title', 'Cours')
@section('isActive1')
active
@endsection
@section('content')

<div class="container">
    <h1>{{ $cours->titre }}</h1>

    <div class="mb-3">
        <strong>Titre:</strong> {{ $cours->titre }}
    </div>

    <div class="mb-3">
        <strong>Description:</strong> {{ $cours->description }}
    </div>

    <div class="mb-3">
        <strong>Image:</strong>
        @if ($cours->image)
            <img src="{{ asset('storage/' . $cours->image) }}" width="200">
        @else
            <p>Aucune image</p>
        @endif
    </div>

    <div class="mb-3">
        <strong>Active:</strong> {{ $cours->active ? 'Oui' : 'Non' }}
    </div>

    @if ($cours->etat == 0)
        
    <form action="{{ route('admin.cours.approve', $cours->id) }}" method="POST" class="d-inline-block">
        @csrf
        <div class="form-group">
            <label for="commentaire">Commentaire (optional)</label>
            <textarea name="commentaire" id="commentaire" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Approuver</button>
    </form>
    
    <form action="{{ route('admin.cours.reject', $cours->id) }}" method="POST" class="d-inline-block">
        @csrf
        <div class="form-group">
            <label for="commentaire">Commentaire (optional)</label>
            <textarea name="commentaire" id="commentaire" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-danger mt-2">Rejeter</button>
    </form>
    @endif

    <br>
    <a href="{{ route('admin.cours.list') }}" class="btn btn-secondary">Retour</a>
</div>

@endsection
