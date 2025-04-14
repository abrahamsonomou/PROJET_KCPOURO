@extends('v1.admin.base')
@section('title', 'services')
@section('isActive11')
active
@endsection
@section('isActive12')
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
                    <a href="{{ route('admin.services.create') }}" class="btn btn-outline-primary rounded-3 d-flex align-items-center gap-1">
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
                            <th>Titre</th>
                            <th>Image</th>
                            <th>Ordre</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->titre }}</td>
                        <td><img src="{{ asset('storage/' . $service->image) }}" width="50"></td>
                        <td>{{ $service->ordre }}</td>
                        <td>
                            @if ($service->active == 0)
                            <span class="badge bg-warning bg-opacity-15 text-warning">Inactif</span> 
                        @elseif($service->active == 1)
                            <span class="badge bg-warning bg-opacity-15 text-success">Actif</span> 
                        @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce service ?')">Supprimer</button>
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
                <p class="mb-0 text-center text-sm-start">Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} entries</p>
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        {{ $services->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div> --}}

    </div>
</div>
@endsection
