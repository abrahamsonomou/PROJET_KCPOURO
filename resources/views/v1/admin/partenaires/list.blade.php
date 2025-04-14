@extends('v1.admin.base')
@section('title', 'partenaires')
@section('isActive24')
active
@endsection
@section('isActive28')
active
@endsection
@section('content')
<div class="page-content-wrapper border">
    <div class="card bg-transparent border">
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
                <div class="col-md-2">
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

                <div class="col-md-2">
                    <a href="{{ route('admin.partenaires.create') }}" class="btn btn-outline-primary rounded-3 d-flex align-items-center gap-1">
                        <i class="mdi mdi-plus-circle fs-4"></i>
						 Ajouter
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive border-0 rounded-3">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Image</th>
                            <th>Ordre</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($partenaires as $partenaire)
                    <tr>
                        <td>{{ $partenaire->id }}</td>
                        <td>{{ $partenaire->nom }}</td>
                        <td><img src="{{ asset('storage/' . $partenaire->logo) }}" width="50"></td>
                        <td>{{ $partenaire->ordre }}</td>
                        <td>{{ $partenaire->active ? 'Oui' : 'Non' }}</td>
                        <td>
                            <a href="{{ route('admin.partenaires.show', $partenaire->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('admin.partenaires.edit', $partenaire->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('admin.partenaires.destroy', $partenaire->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce partenaire ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
  
        {{-- <div class="card-footer bg-transparent pt-0">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <p class="mb-0 text-center text-sm-start">Showing {{ $partenaires->firstItem() }} to {{ $partenaires->lastItem() }} of {{ $partenaires->total() }} entries</p>
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        {{ $partenaires->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div> --}}

    </div>
</div>
@endsection
