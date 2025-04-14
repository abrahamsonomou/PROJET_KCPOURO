@extends('v1.admin.base')
@section('title', 'Edit Tag')
@section('isActive11')
active
@endsection
@section('isActive14')
active
@endsection
@section('content')
<div class="container mt-4">
    <h1>Mise à jour du Tag</h1>

    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="nom">Titre</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $tag->nom }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="is_article">Is Article?</label>
            <select name="is_article" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1" {{ $tag->is_article ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$tag->is_article ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="is_cours">Is Course?</label>
            <select name="is_cours" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1" {{ $tag->is_cours ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$tag->is_cours ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="active">Active</label>
            <select name="active" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1" {{ $tag->active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$tag->active ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('admin.tags.list') }}" class="btn btn-secondary mt-3">Back to List</a>
    </form>
</div>
@endsection
