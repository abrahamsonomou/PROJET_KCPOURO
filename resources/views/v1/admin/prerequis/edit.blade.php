@extends('v1.admin.base')
@section('title', 'prerequis')
@section('isActive11')
active
@endsection
@section('isActive15')
active
@endsection
@section('content')
<div class="container mt-4">
    <h1>Mise à jour du prerequis</h1>

    <form action="{{ route('admin.prerequis.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $item->nom) }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="active">Active</label>
            {{-- <input type="checkbox" name="active" id="active" class="form-sweet" {{ old('active', $item->active) ? 'checked' : '' }}> --}}
            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Mettre à jour</button>
        <a href="{{ route('admin.prerequis.list') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
