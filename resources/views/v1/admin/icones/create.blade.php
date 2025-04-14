@extends('v1.admin.base')
@section('title', 'Icones')
@section('isActive30')
active
@endsection
@section('isActive24')
active
@endsection
@section('content')
    <h1>Créer une icône</h1>
    <form action="{{ route('admin.icones.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="active">Actif</label>
            <input type="checkbox" name="active" id="active" checked>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
@endsection

