@extends('v1.admin.base')
@section('title', 'Articles')
@section('isActive11')
    active
@endsection
@section('isActive12')
    active
@endsection
@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Creation d'un nouvel Article</h1>

        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-md-12 mb-2">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control" required>
            </div>

            {{-- <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div> --}}


            <div class="col-lg-12 mb-2">
                <label for="description">Description</label>
                <textarea id="editor" name="description" class="form-control" required></textarea>
            </div>

            <div class="col-lg-6 mb-2">
                <label class="form-label">Select Categorie *</label>
                <select name="categorie_id" id="categorie_id" class="form-select js-choice z-index-9 border-0 bg-light"
                    aria-label=".form-select-sm" required>
                    <option value="">Select Categorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-6 mb-2">
                <label class="form-label">Select auteur *</label>
                <select name="user_id" id="user_id" class="form-select js-choice z-index-9 border-0 bg-light"
                    aria-label=".form-select-sm" required>
                    <option value="">Select Auteur</option>
                    @foreach ($auteurs as $auteur)
                        <option value="{{ $auteur->id }}">{{ $auteur->name }} ({{ $auteur->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2 col-md-6">
                <label for="image">image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="mb-2 col-md-2">
                <label for="active">active</label>
                {{-- <input type="checkbox" name="active" id="active" checked> --}}
                <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>


            <div class="col-lg-4">
                <label class="form-label">Statut de l'Article</label>
                <div class="d-sm-flex">
                    <div class="form-check radio-bg-light me-4">
                        <input class="form-check-input" type="radio" name="etat" id="nouveau" value="0" checked>
                        <label class="form-check-label" for="nouveau">
                            Nouveau
                        </label>
                    </div>
                    <div class="form-check radio-bg-light me-4">
                        <input class="form-check-input" type="radio" name="etat" id="approuver" value="1">
                        <label class="form-check-label" for="approuver">
                            Approuver
                        </label>
                    </div>
                    <div class="form-check radio-bg-light">
                        <input class="form-check-input" type="radio" name="etat" id="annuler" value="2">
                        <label class="form-check-label" for="annuler">
                            Annuler
                        </label>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row container my-4 d-flex justify-content-center">
                <h5 class=" text-primary fs-4">Tags</h5>
                @foreach ($tags as $tag)
                    <div class="col-md-2 mb-0">
                        <label>
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                            {{ $tag->nom }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

            <button type="submit" class="btn btn-primary">Create Article</button>
            <a href="{{ route('admin.articles.list') }}" class="btn btn-secondary">Retour à la liste</a>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>


@endsection
