@extends('v1.admin.base')
@section('title', 'specialites')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Libelle: {{ $specialite->nom }}</h1>
    <p><strong>Active:</strong> {{ $specialite->active ? 'Yes' : 'No' }}</p>
    <a href="{{ route('admin.specialites.list') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
