@extends('v1.admin.base')
@section('title', 'tags')
@section('isActive11')
active
@endsection
@section('isActive14')
active
@endsection
@section('content')
<div class="container mt-4">
    <h1>Creation d'un nouveau Tag</h1>

    <form action="{{ route('admin.tags.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="nom">Titre</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label for="is_article">Is Article?</label>
            {{-- <input type="checkbox" name="is_article" id="is_article"> --}}
            <select name="is_article" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="is_cours">Is Course?</label>
            {{-- <input type="checkbox" name="is_cours" id="is_cours"> --}}
            <select name="is_cours" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="active">Active</label>
            {{-- <input type="checkbox" name="active" id="active" checked> --}}
            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
        <a href="{{ route('admin.tags.list') }}" class="btn btn-secondary mt-3">Back to List</a>
    </form>
</div>
@endsection
