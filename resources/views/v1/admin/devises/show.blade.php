@extends('v1.admin.base')
@section('title', 'Devises')
@section('isActive16')
active
@endsection
@section('isActive19')
active
@endsection
@section('content')
<div class="container">
    <h1>{{ $devise->nom }}</h1>
    <p><strong>Code ISO:</strong> {{ $devise->code_iso }}</p>
    <p><strong>Symbole:</strong> {{ $devise->symbole }}</p>
    <p><strong>Nom Court:</strong> {{ $devise->nom_court }}</p>
    <p><strong>Active:</strong> {{ $devise->active ? 'Yes' : 'No' }}</p>
    <a href="{{ route('admin.devises.list') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
