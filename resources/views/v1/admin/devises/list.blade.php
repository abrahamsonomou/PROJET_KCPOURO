@extends('v1.admin.base')
@section('title', 'Devises')
@section('isActive16')
active
@endsection
@section('isActive19')
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
                    <a href="{{ route('admin.devises.create') }}" class="btn btn-outline-primary rounded-3 d-flex align-items-center gap-1">
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
                            <th scope="col" class="border-0">Code ISO</th>
                            <th scope="col" class="border-0">Symbole</th>
                            <th scope="col" class="border-0">Nom</th>
                            <th scope="col" class="border-0">Nom Court</th>
                            <th scope="col" class="border-0">Active</th>
                            <th scope="col" class="border-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach($devises as $devise)
						<tr>
							<td data-label="Libellé">{{ $devise->code_iso }}</td>
							<td data-label="Code">{{ $devise->symbole }}</td>
							<td data-label="Description">{{ $devise->nom }}</td>
							<td data-label="Description">{{ $devise->nom_court }}</td>
                            
							<td data-label="Statut">

                                @if ($devise->active == 0)
                                    
                                    <span class="badge bg-warning bg-opacity-15 text-warning">Inactif</span> 
                                    @elseif($devise->active == 1)
                                        
                                    <span class="badge bg-warning bg-opacity-15 text-success">Actif</span> 
                                    @endif
							</td>
                            <td>
                                <a href="{{ route('admin.devises.show', $devise->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.devises.edit', $devise->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.devises.destroy', $devise->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
                <p class="mb-0 text-center text-sm-start">Showing {{ $devises->firstItem() }} to {{ $devises->lastItem() }} of {{ $devises->total() }} entries</p>
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        {{ $devises->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</div>

@endsection
