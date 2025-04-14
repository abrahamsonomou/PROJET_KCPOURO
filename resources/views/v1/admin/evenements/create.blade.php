@extends('v1.admin.base')
@section('title', 'Evenements')
@section('isActive29')
active
@endsection
@section('isActive24')
active
@endsection
@section('content')
<div class="container mt-5">
    <h1>Créer un événement</h1>
    <form action="{{ route('admin.evenements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" name="date" id="date">
        </div>
        <div class="form-group">
            <label for="lieu">Lieu</label>
            <input type="text" class="form-control" name="lieu" id="lieu">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="active">Actif</label>
            <input type="checkbox" name="active" id="active" checked>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
@endsection

