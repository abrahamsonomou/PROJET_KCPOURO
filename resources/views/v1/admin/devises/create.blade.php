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
    <h1>Create New Devise</h1>

    <form action="{{ route('admin.devises.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code_iso">Code ISO</label>
            <input type="text" name="code_iso" id="code_iso" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="symbole">Symbole</label>
            <input type="text" name="symbole" id="symbole" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nom_court">Nom Court</label>
            <input type="text" name="nom_court" id="nom_court" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="active">Active</label>
            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
