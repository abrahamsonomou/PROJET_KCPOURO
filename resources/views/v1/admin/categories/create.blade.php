@extends('v1.admin.base')
@section('title', 'categories')
@section('isActive11')
active
@endsection
@section('isActive13')
active
@endsection
@section('content')
<div class="container">
    <h1>Create New Category</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>

        <div class="col-lg-6">
            <label class="form-label">Select Icone *</label>
            <select name="icon" id="icon"
                class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
                <option value="">Select Icone</option>
                @foreach ($icones as $icone)
                    <option value="{{ $icone->nom }}">{{ $icone->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="is_article">Is Article?</label>
            {{-- <input type="checkbox" name="is_article" id="is_article"> --}}
            <select name="is_article" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="is_cours">Is Course?</label>
            {{-- <input type="checkbox" name="is_cours" id="is_cours"> --}}
            <select name="is_cours" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="active">Active</label>
            {{-- <input type="checkbox" name="active" id="active" checked> --}}
            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
