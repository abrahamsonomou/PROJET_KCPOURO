@extends('v1.admin.base')
@section('title', 'slides')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
   <div class="container mt-5">
    <h1 class="text-center">Modifier un témoignage</h1>
    <form action="{{ route('admin.temoignages.update', $temoignage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre" value="{{ $temoignage->titre }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description">{{ $temoignage->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="specialite">Spécialité</label>
            <input type="text" class="form-control" name="specialite" id="specialite" value="{{ $temoignage->specialite }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">
            @if($temoignage->image)
                <img src="{{ asset('storage/' . $temoignage->image) }}" alt="Image actuelle" width="100">
            @endif
        </div>
        <div class="form-group">
            <label for="ordre">Ordre</label>
            <input type="number" class="form-control" name="ordre" id="ordre" value="{{ $temoignage->ordre }}">
        </div>
        <div class="form-group">
            <label for="active">Actif</label>
            <input type="checkbox" name="active" id="active" {{ $temoignage->active ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
   </div>
@endsection
