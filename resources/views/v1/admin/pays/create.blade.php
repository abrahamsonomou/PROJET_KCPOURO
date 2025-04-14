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
    <h1>Create New Pays</h1>

    <form action="{{ route('admin.pays.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="code_iso">Code ISO</label>
            <input type="text" name="code_iso" id="code_iso" class="form-control">
        </div>
        <div class="form-group">
            <label for="indicatif">Indicatif</label>
            <input type="text" name="indicatif" id="indicatif" class="form-control">
        </div>
        <div class="form-group">
            <label for="nationnalite">Nationalité</label>
            <input type="text" name="nationnalite" id="nationnalite" class="form-control">
        </div>
        <div class="form-group">
            <label for="active">Active</label>
            {{-- <input type="checkbox" name="active" id="active" class="form-sweet" checked> --}}
            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>



        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
</div>
@endsection
