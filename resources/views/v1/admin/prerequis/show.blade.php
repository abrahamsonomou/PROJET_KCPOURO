@extends('v1.admin.base')
@section('title', 'prerequis')
@section('isActive11')
active
@endsection
@section('isActive15')
active
@endsection
@section('content')
<div class="container">
    <h1>Nom: {{ $item->nom }}</h1>
    <p><strong>Active:</strong> {{ $item->active ? 'Yes' : 'No' }}</p>
    <a href="{{ route('admin.prerequis.list') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
