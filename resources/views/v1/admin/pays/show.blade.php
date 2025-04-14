@extends('v1.admin.base')
@section('title', 'Pays')
@section('isActive16')
active
@endsection
@section('isActive17')
active
@endsection
@section('content')
<div class="container">
    <h1>{{ $pays->nom }}</h1>
    <p><strong>Code ISO:</strong> {{ $pays->code_iso }}</p>
    <p><strong>Indicatif:</strong> {{ $pays->indicatif }}</p>
    <p><strong>Nationalité:</strong> {{ $pays->nationnalite }}</p>
    <p><strong>Active:</strong> {{ $pays->active ? 'Yes' : 'No' }}</p>
    <a href="{{ route('pays.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
