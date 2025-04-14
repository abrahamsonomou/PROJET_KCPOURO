@extends('v1.admin.base')
@section('title', 'View Tag')
@section('isActive11')
active
@endsection
@section('isActive14')
active
@endsection
@section('content')
<div class="container">
    <h1>Tag Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Code: {{ $tag->code }}</h5>
            <p class="card-text"><strong>Name:</strong> {{ $tag->nom }}</p>
            <p class="card-text"><strong>Is Article?</strong> {{ $tag->is_article ? 'Yes' : 'No' }}</p>
            <p class="card-text"><strong>Is Course?</strong> {{ $tag->is_cours ? 'Yes' : 'No' }}</p>
            <p class="card-text"><strong>Active:</strong> {{ $tag->active ? 'Yes' : 'No' }}</p>
        </div>
    </div>

    <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning mt-3">Edit</a>
    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <a href="{{ route('admin.tags.list') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
