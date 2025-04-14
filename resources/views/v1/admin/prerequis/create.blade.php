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
    <h1>Creation d'un nouveau prerequis</h1>

    <form action="{{ route('admin.prerequis.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label for="active">Active</label>
            {{-- <input type="checkbox" name="active" id="active" class="form-sweet" checked> --}}
            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
        <a href="{{ route('admin.prerequis.list') }}" class="btn btn-secondary mt-4">Back to List</a>
    </form>
</div>
@endsection
