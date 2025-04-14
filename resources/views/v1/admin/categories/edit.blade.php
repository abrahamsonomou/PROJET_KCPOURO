@extends('v1.admin.base')
@section('title', 'Edit categorie')
@section('isActive11')
active
@endsection
@section('isActive13')
active
@endsection
@section('content')
<div class="container">
    <h1>Edit categorie</h1>

    <form action="{{ route('admin.categories.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Name</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $categorie->nom }}" required>
        </div>

        <div class="col-lg-6">
            <label class="form-label">Select Icone *</label>
            <select name="icon" id="icon"
                class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
                <option value="">Select Icone</option>
                @foreach ($icones as $icone)
                    <option value="{{ $icone->nom }}" {{ $icone->nom == old('icon', $icone->nom) ? 'selected' : '' }}>
                        {{ $icone->nom }}
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="is_article">Is Article?</label>
            <select name="is_article" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1" {{ $categorie->is_article ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$categorie->is_article ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="is_cours">Is Course?</label>
            <select name="is_cours" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1" {{ $categorie->is_cours ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$categorie->is_cours ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="active">Active</label>
            <select name="active" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1" {{ $categorie->active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$categorie->active ? 'selected' : '' }}>No</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
