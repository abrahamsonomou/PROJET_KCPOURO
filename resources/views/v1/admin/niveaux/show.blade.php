@extends('v1.admin.base')
@section('title', 'Niveaux')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Libelle: {{ $niveau->nom }}</h1>
    <p><strong>Active:</strong> {{ $niveau->active ? 'Yes' : 'No' }}</p>
    <a href="{{ route('admin.niveaux.list') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
