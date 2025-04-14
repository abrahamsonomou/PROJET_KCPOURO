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
    <h1>Create New specialites</h1>

    <form action="{{ route('admin.specialites.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label for="active">Active</label>
            {{-- <input type="checkbox" name="active" id="active" class="form-sweet" checked> --}}
            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
