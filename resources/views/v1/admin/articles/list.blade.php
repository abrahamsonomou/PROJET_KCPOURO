@extends('v1.admin.base')
@section('title', 'Articles')
@section('isActive8')
active
@endsection
@section('content')

<div class="page-content-wrapper border">

    <div class="row mb-3">
        <div class="col-12 d-sm-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 mb-sm-0">Nombres articles: <span class="badge bg-orange bg-opacity-10 text-orange">{{ $articleCount }}</span></h1>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-sm btn-primary mb-0">Create article</a>
        </div>
    </div>

    <div class="card bg-transparent border">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
        <div class="card-header bg-light border-bottom">
            <div class="row g-3 align-items-center justify-content-between">

                <div class="col-md-8">
                    <form class="rounded position-relative">
                        <input class="form-control bg-body" type="search" placeholder="Search" aria-label="Search">
                        <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                            <i class="fas fa-search fs-6 "></i>
                        </button>
                    </form>
                </div>

                <div class="col-md-3">
                    <form>
                        <select class="form-select js-choice border-0 z-index-9" aria-label=".form-select-sm">
                            <option value="">Sort by</option>
                            <option>Newest</option>
                            <option>Oldest</option>
                            <option>Accepted</option>
                            <option>Rejected</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive border-0 rounded-3">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            {{-- <th>Description</th> --}}
                            <th>Category</th>
                            <th>Author</th>
                            <th>Active</th>
                            <th>Etat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>

                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <div class="w-60px">
                                        <img src="{{ asset('storage/' . $article->image) }}" class="rounded" alt="">
                                    </div>
                                    <h6 class="table-responsive-title mb-0 ms-2">    
                                        <a href="#" class="stretched-link">{{  Str::limit($article->titre, 20) }}</a>
                                    </h6>
                                </div>
                            </td>
                            {{-- <td>{{ Str::limit($article->description, 50) }}</td> <!-- Displaying a shortened version of the description --> --}}
                            <td>{{ $article->categorie->nom }}</td>
                            <td>{{ $article->user->first_name ?? 'Auteur' }} {{ $article->user->last_name ?? '' }}</td>
                            <td> 
                                @if ($article->active == 0)
                                    <span class="badge bg-warning bg-opacity-15 text-warning">Inactif</span> 
                                @elseif($article->active == 1)
                                    <span class="badge bg-warning bg-opacity-15 text-success">Actif</span> 
                                @endif
                            </td>
                            <td> 
                                @if ($article->etat == 0)
                                    <span class="badge bg-warning bg-opacity-15 text-primary">Nouveau</span> 
                                @elseif($article->etat == 1)
                                    <span class="badge bg-warning bg-opacity-15 text-success">Approuvé</span> 
                                @elseif($article->etat == 2)
                                    <span class="badge bg-warning bg-opacity-15 text-danger">Rejeté</span> 
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.articles.show', $article->id) }}" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">View</a>
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-dark-soft me-1 mb-1 mb-md-0">Edit</a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet articles ?')" class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">Delete</button>
                                </form>
                                <form action="{{ route('admin.articles.toggleStatus', $article->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                        @if ($article->active == 0)
                                        <button type="submit" class="btn btn-sm btn-warning-soft me-1 mb-1 mb-md-0">
                                            Activer
                                        @else
                                            <button type="submit" class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">
                                                Désactiver
                                            @endif
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-transparent pt-0">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <p class="mb-0 text-center text-sm-start">Showing {{ $articles->firstItem() }} to {{ $articles->lastItem() }} of {{ $articles->total() }} entries</p>
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        {{ $articles->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
        
    </div>
</div>

@endsection
