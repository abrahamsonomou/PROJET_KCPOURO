@extends('v1.admin.base')
@section('title', 'Slides')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
  <div class="container mt-5">
    <h1 class="text-center">Créer un témoignage</h1>
    <form action="{{ route('admin.temoignages.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="specialite">Spécialité</label>
            <input type="text" class="form-control" name="specialite" id="specialite">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="ordre">Ordre</label>
            <input type="number" class="form-control" name="ordre" id="ordre" value="0">
        </div>
        <div class="form-group">
            <label for="active">Actif</label>
            <input type="checkbox" name="active" id="active" checked>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
  </div>
@endsection
