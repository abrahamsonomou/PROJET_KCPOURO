@extends('v1.admin.base')
@section('title', 'Villes')
@section('isActive16')
active
@endsection
@section('isActive18')
active
@endsection
@section('content')
<div class="container mt-4">
    <h2>Liste des villes</h2>
    <a href="{{ route('admin.villes.create') }}" class="btn btn-primary mb-3">Ajouter une ville</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Pays</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($villes as $ville)
                <tr>
                    <td>{{ $ville->id }}</td>
                    <td>{{ $ville->nom }}</td>
                    <td>{{ $ville->pays->nom ?? 'N/A' }}</td>
                    <td>{{ $ville->active ? 'Oui' : 'Non' }}</td>
                    <td>
                        <a href="{{ route('admin.villes.edit', $ville->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('admin.villes.destroy', $ville->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette ville ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer bg-transparent pt-0">
        <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
            <p class="mb-0 text-center text-sm-start">Showing {{ $villes->firstItem() }} to {{ $villes->lastItem() }} of {{ $villes->total() }} entries</p>
            <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                    {{ $villes->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
        </div>
    </div>

</div>
@endsection
