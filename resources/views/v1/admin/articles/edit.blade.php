@extends('v1.admin.base')
@section('title', 'categories')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Edit Article</h1>

    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- This specifies that the form is updating an existing resource -->
        
        <div class="form-group">
            <label for="titre">Title</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $article->titre) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $article->description) }}</textarea>
        </div>

  
        <div class="col-lg-6">
            <label class="form-label">Select auteur *</label>
            <select name="user_id" id="user_id" class="form-select js-choice z-index-9 border-0 bg-light" required>
                <option value="">Select auteur</option>
                @foreach ($auteurs as $auteur)
                    <option value="{{ $auteur->id }}" {{ $auteur->id == old('user_id', $article->user_id) ? 'selected' : '' }}>
                        {{ $auteur->first_name }} {{ $auteur->last_name }} ({{ $auteur->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-6">
            <label class="form-label">Select Categorie *</label>
            <select name="categorie_id" id="categorie_id" class="form-select js-choice z-index-9 border-0 bg-light" required>
                <option value="">Select Categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('categorie_id', $article->categorie_id) ? 'selected' : '' }}>
                        {{ $category->nom }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <!-- Display current image if exists -->
            @if($article->image)
                <div>
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $article->image) }}" alt="Current Image" width="100">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="active">Active</label>
            <select name="active" id="active" class="form-select">
                <option value="1" {{ old('active', $article->active) == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('active', $article->active) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <hr>
        <div class="row container my-4 d-flex justify-content-center">
            <h5 class=" text-primary fs-4">Tags</h5>
            @foreach ($tags as $tag)
                <div class="col-md-2 mb-0">
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @if(in_array($tag->id, old('tags', $article->tags->pluck('id')->toArray()))) checked @endif>
                        {{ $tag->nom }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Update Article</button>
        <a href="{{ route('admin.articles.list') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>

@endsection
