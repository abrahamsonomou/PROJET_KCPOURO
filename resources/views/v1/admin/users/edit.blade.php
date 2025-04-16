@extends('v1.admin.base')
@section('title', 'Edit User')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')
<div class="container">
    <h1>Edit User</h1>
    @if ($errors->any())
    <div>
        <p style="color: red;">{{ $errors->first() }}</p>
    </div>
    @endif
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        {{-- <div class="mb-2 col-md-6">
            <label for="password">password</label>
            <input type="text" name="password" id="password" class="form-control">
        </div> --}}
        <div class="mb-2 col-md-6">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        {{-- <div class="mb-2 col-md-6">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div> --}}
        <div class="mb-2 col-md-6">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}">
        </div>
        <div class="mb-2 col-md-6">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}">
        </div>
        <div class="mb-2 col-md-6">
            <label for="telephone">Telephone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $user->telephone }}">
        </div>
        <div class="mb-2 col-md-6">
            <label for="date_naissance">Date of Birth</label>
            <input type="date" name="date_naissance" id="date_naissance" class="form-control" value="{{ $user->date_naissance }}">
        </div>
        <div class="mb-2 col-md-6">
            <label for="adresse1">Address 1</label>
            <input type="text" name="adresse1" id="adresse1" class="form-control" value="{{ $user->adresse1 }}">
        </div>
        <div class="mb-2 col-md-6">
            <label for="adresse2">Address 2</label>
            <input type="text" name="adresse2" id="adresse2" class="form-control" value="{{ $user->adresse2 }}">
        </div>
        <div class="mb-2 col-md-6">
            <label for="pays_id">Country</label>
            <select name="pays_id" id="pays_id" class="form-control">
                @foreach($pays as $pay)
                    <option value="{{ $pay->id }}" {{ $user->pays_id == $pay->id ? 'selected' : '' }}>{{ $pay->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2 col-md-6">
            <label for="villeId">City</label>
            <select name="villeId" id="villeId" class="form-control">
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" {{ $user->villeId == $ville->id ? 'selected' : '' }}>{{ $ville->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2 col-md-6">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
        </div>
        @if($user->avatar)
        <div class="mb-2 col-md-6 mt-3">
            <label>Current Avatar</label>
            <div>
                <img src="{{ asset(user->avatar) }}" alt="User Avatar" class="img-thumbnail" width="150">
            </div>
        </div>
        @endif
        <div class="mb-2 col-md-2">
            <label for="is_admin">Is Admin?</label>
            <select name="is_admin" class="form-select">
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="mb-2 col-md-2">
            <label for="approuve_cours">Is approuve_cours?</label>
            <select name="approuve_cours" class="form-select">
                <option value="1" {{ $user->approuve_cours ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$user->approuve_cours ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="mb-2 col-md-2">
            <label for="is_active">Is Active?</label>
            <select name="is_active" class="form-select">
                <option value="1" {{ $user->is_active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$user->is_active ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="mb-2 col-md-2">
            <label for="role">Role</label>
            <select name="role" class="form-select">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Apprenant</option>
                <option value="instructor" {{ $user->role == 'instructor' ? 'selected' : '' }}>Consultant</option>
            </select>
        </div>


        <div class="mb-2 col-md-2">
            <label for="is_othor">Is Auteur?</label>
            <select name="is_othor" class="form-select">
                <option value="1" {{ $user->is_othor ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$user->is_othor ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-2 col-md-6">
            <label for="specialite_id">Specialite</label>
            <select name="specialite_id" id="specialite_id" class="form-control">
                <option value="">Selectionner une Specialite</option>
                @foreach($specialites as $specialite)
                    <option value="{{ $specialite->id }}" {{ $user->specialite_id == $specialite->id ? 'selected' : '' }}>{{ $specialite->nom }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-2 col-md-12">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control">{{ $user->bio }}</textarea>
        </div>

    </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.users.list') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
