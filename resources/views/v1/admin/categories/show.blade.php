@extends('v1.admin.base')
@section('title', 'Show Category')
@section('isActive11')
active
@endsection
@section('isActive13')
active
@endsection
@section('content')
<div class="container">
    <h1>Category Details</h1>

    <div class="form-group">
        <label for="code">Code:</label>
        <p class="form-control">{{ $category->code }}</p>
    </div>
    <div class="form-group">
        <label for="nom">Name:</label>
        <p class="form-control">{{ $category->nom }}</p>
    </div>
    <div class="form-group">
        <label for="is_article">Is Article?</label>
        <p class="form-control">{{ $category->is_article ? 'Yes' : 'No' }}</p>
    </div>
    <div class="form-group">
        <label for="is_cours">Is Course?</label>
        <p class="form-control">{{ $category->is_cours ? 'Yes' : 'No' }}</p>
    </div>
    <div class="form-group">
        <label for="active">Active:</label>
        <p class="form-control">{{ $category->active ? 'Yes' : 'No' }}</p>
    </div>

    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
