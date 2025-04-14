@extends('v1.admin.base')
@section('title', 'Show Langue')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Language Details</h1>
    
    <div class="form-group">
        <label>Code:</label>
        <p>{{ $langue->code }}</p>
    </div>
    <div class="form-group">
        <label>Name:</label>
        <p>{{ $langue->nom }}</p>
    </div>
    <div class="form-group">
        <label>Is Course?</label>
        <p>{{ $langue->is_cours ? 'Yes' : 'No' }}</p>
    </div>
    <div class="form-group">
        <label>Active:</label>
        <p>{{ $langue->active ? 'Yes' : 'No' }}</p>
    </div>
    
    <a href="{{ route('admin.langues.edit', $langue->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('admin.langues.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection