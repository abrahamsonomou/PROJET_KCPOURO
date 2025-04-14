@extends('v1.admin.base')
@section('title', 'slides')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="page-content-wrapper border">
    <!-- Card START -->
    <div class="card bg-transparent border">

        <!-- Card header START -->
        <div class="card-header bg-light border-bottom">
            <!-- Search and select START -->
            <div class="row g-3 align-items-center justify-content-between">

                <!-- Search bar -->
                <div class="col-md-8">
                    <form class="rounded position-relative">
                        <input class="form-control bg-body" type="search" placeholder="Search" aria-label="Search">
                        <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                            <i class="fas fa-search fs-6 "></i>
                        </button>
                    </form>
                </div>
                
                <!-- Select option -->
                <div class="col-md-2">
                    <!-- Short by filter -->
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
                    <a href="{{ route('admin.slides.create') }}" class="btn btn-outline-primary rounded-3 d-flex align-items-center gap-1">
                        <i class="mdi mdi-plus-circle fs-4"></i>
						 Ajouter
                    </a>
                </div>
            </div>
            <!-- Search and select END -->
        </div>
        <!-- Card header END -->

        <!-- Card body START -->
        <div class="card-body">
            <!-- Course table START -->
            <div class="table-responsive border-0 rounded-3">
                <!-- Table START -->
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
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

                    <!-- Table body START -->
                    <tbody>
                    @foreach($slides as $slide)
                    <tr>
                        <td>{{ $slide->id }}</td>
                        <td>{{ $slide->titre }}</td>
                        <td><img src="{{ asset('storage/' . $slide->image) }}" width="50"></td>
                        <td>{{ $slide->ordre }}</td>
                        <td>{{ $slide->active ? 'Oui' : 'Non' }}</td>
                        <td>
                            <a href="{{ route('admin.slides.show', $slide->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('admin.slides.edit', $slide->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce slide ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                    <!-- Table body END -->
                </table>
                <!-- Table END -->
            </div>
            <!-- Course table END -->
        </div>
        <!-- Card body END -->

        <div class="card-footer bg-transparent pt-0">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <p class="mb-0 text-center text-sm-start">Showing {{ $slides->firstItem() }} to {{ $slides->lastItem() }} of {{ $slides->total() }} entries</p>
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        {{ $slides->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Card END -->
</div>
@endsection
