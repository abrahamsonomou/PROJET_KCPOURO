@extends('v1.admin.base')
@section('title', 'categories')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Article Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $article->titre }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong></p>
            <p>{{ $article->description }}</p>

            <p><strong>Category:</strong> {{ $article->categorie->nom }}</p>

            <p><strong>Active:</strong> 
                @if ($article->active == 0)
                <span class="badge bg-warning bg-opacity-15 text-warning">Inactif</span> 
            @elseif($article->active == 1)
                <span class="badge bg-warning bg-opacity-15 text-success">Actif</span> 
            @endif
            </p>

            @if($article->image)
                <p><strong>Image:</strong></p>
                <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" width="200">
            @endif
        </div>

    @if ($article->etat == 0)
        
        <form action="{{ route('admin.articles.approve', $article->id) }}" method="POST" class="d-inline-block">
            @csrf
            <div class="form-group">
                <label for="commentaire">Commentaire (optional)</label>
                <textarea name="commentaire" id="commentaire" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-2">Approuver</button>
        </form>
        
        <form action="{{ route('admin.articles.reject', $article->id) }}" method="POST" class="d-inline-block">
            @csrf
            <div class="form-group">
                <label for="commentaire">Commentaire (optional)</label>
                <textarea name="commentaire" id="commentaire" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-danger mt-2">Rejeter</button>
        </form>
        @endif

        <div class="card-footer">
            <a href="{{ route('admin.articles.list') }}" class="btn btn-secondary">Back to Articles</a>
            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
