@extends('v1.admin.base')
@section('title', 'slides')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Modifier le Slide</h1>

    <form action="{{ route('admin.slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ $slide->titre }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $slide->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if ($slide->image)
                <img src="{{ asset($slide->image) }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Ordre</label>
            <input type="number" name="ordre" class="form-control" value="{{ $slide->ordre }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Active</label>
            <select name="active" class="form-control">
                <option value="1" {{ $slide->active ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ !$slide->active ? 'selected' : '' }}>Non</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>
@endsection
