@extends('v1.admin.base')
@section('title', 'Utilisateurs')
@section('isActive11')
active
@endsection
@section('isActive12')
active
@endsection
@section('content')

<div class="container mt-4">
    <h1 class="text-center">Create New User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

        <div class="mb-2 col-md-6">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-2 col-md-6">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-2 col-md-6">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-2 col-md-6">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>
        <div class="mb-2 col-md-6">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
        </div>
        <div class="mb-2 col-md-6">
            <label for="telephone">Telephone</label>
            <input type="text" name="telephone" id="telephone" class="form-control">
        </div>
        <div class="mb-2 col-md-6">
            <label for="date_naissance">Date of Birth</label>
            <input type="date" name="date_naissance" id="date_naissance" class="form-control">
        </div>
        <div class="mb-2 col-md-6">
            <label for="adresse1">Address 1</label>
            <input type="text" name="adresse1" id="adresse1" class="form-control">
        </div>
        <div class="mb-2 col-md-6">
            <label for="adresse2">Address 2</label>
            <input type="text" name="adresse2" id="adresse2" class="form-control">
        </div>
        <div class="mb-2 col-md-6">
            <label for="pays_id">Country</label>
            <select name="pays_id" id="pays_id" class="form-control">
                @foreach($pays as $pay)
                    <option value="{{ $pay->id }}">{{ $pay->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2 col-md-6">
            <label for="villeId">City</label>
            <select name="villeId" id="villeId" class="form-control">
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2 col-md-6">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
        </div>

        <div class="mb-2 col-md-2">
            <label for="is_admin">Is Admin?</label>
            {{-- <input type="checkbox" name="is_admin" id="is_admin"> --}}
            <select name="is_admin" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-2 col-md-2">
            <label for="approuve_cours">Is approuve_cours?</label>
            {{-- <input type="checkbox" name="approuve_cours" id="approuve_cours"> --}}
            <select name="approuve_cours" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-2 col-md-2">
            <label for="is_active">is_active</label>
            {{-- <input type="checkbox" name="is_active" id="is_active" checked> --}}
            <select name="is_active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        
        <div class="mb-2 col-md-2">
            <label for="is_othor">Is Auteur</label>
            {{-- <input type="checkbox" name="is_othor" id="is_othor" checked> --}}
            <select name="is_othor" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-2 col-md-2">
            <label for="role">Role</label>
            {{-- <input type="checkbox" name="role" id="role" class="form-sweet" checked> --}}
            <select name="role" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                <option value="admin">Admin</option>
                <option value="student">Apprenant</option>
                <option value="instructor">Consultant</option>
            </select>
        </div>

        <div class="mb-2 col-md-6">
            <label for="specialite_id">Specialite</label>
            <select name="specialite_id" id="specialite_id" class="form-control">
                <option value="">Selectionner une Specialite</option>
                @foreach($specialites as $specialite)
                    <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2 col-md-12" >
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control"></textarea>
        </div>
    </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('admin.users.list') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>

@endsection
