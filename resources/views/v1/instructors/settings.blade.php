@extends('v1.instructors.base')
@section('title', 'Settings')
@section('isActive6')
    -is-active -dark-bg-dark-2
@endsection
@section('content')
    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">
                <h1 class="text-30 lh-12 fw-700">Profile </h1>
            </div>
        </div>


        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="tabs -active-purple-2 js-tabs pt-0">
                        <div
                            class="tabs__controls d-flex x-gap-30 items-center pt-20 px-30 border-bottom-light js-tabs-controls">
                            <button class="tabs__button text-light-1 js-tabs-button is-active" data-tab-target=".-tab-item-1"
                                type="button">
                                Compte Utilisateur
                            </button>
                            <button class="tabs__button text-light-1 js-tabs-button" data-tab-target=".-tab-item-2"
                                type="button">
                                Sécurité
                            </button>
                        </div>

                        <div class="tabs__content py-30 px-30 js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">
                                <form action="{{ route('profile.update') }}" method="POST"
                                    class="contact-form row y-gap-30" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                            placeholder="email">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                            placeholder="Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input type="text" name="first_name"
                                            value="{{ old('first_name', $user->first_name) }}" placeholder="First Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name"
                                            value="{{ old('last_name', $user->last_name) }}" placeholder="Last Name">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Telephone</label>
                                        <input type="text" name="telephone"
                                            value="{{ old('telephone', $user->telephone) }}" placeholder="Telephone">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Date de naissance</label>
                                        <input type="date" class="form-control" name="date_naissance"
                                            value="{{ old('date_naissance', $user->date_naissance) }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Adresse 1</label>
                                        <input type="text" name="adresse1" value="{{ old('adresse1', $user->adresse1) }}"
                                            placeholder="Adresse 1">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Adresse 2</label>
                                        <input type="text" name="adresse2" value="{{ old('adresse2', $user->adresse2) }}"
                                            placeholder="Adresse 2">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Pays</label>
                                        <select name="pays_id" class="form-control">
                                            <option value="">-- Choisir un pays --</option>
                                            @foreach ($pays as $pay)
                                                <option value="{{ $pay->id }}"
                                                    {{ old('pays_id', $user->pays_id) == $pay->id ? 'selected' : '' }}>
                                                    {{ $pay->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Ville</label>
                                        <select name="ville_id" class="form-control">
                                            <option value="">-- Choisir une ville --</option>
                                            @foreach ($villes as $ville)
                                                <option value="{{ $ville->id }}"
                                                    {{ old('ville_id', $user->ville_id) == $ville->id ? 'selected' : '' }}>
                                                    {{ $ville->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Spécialité</label>
                                        <select name="specialite_id" class="form-control">
                                            <option value="">-- Choisir une spécialité --</option>
                                            @foreach ($specialites as $specialite)
                                                <option value="{{ $specialite->id }}"
                                                    {{ old('specialite_id', $user->specialite_id) == $specialite->id ? 'selected' : '' }}>
                                                    {{ $specialite->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Avatar</label>
                                        <input type="file" name="avatar" class="form-control">
                                    </div>

                                    @if ($user->avatar)
                                        <div class="col-md-6 mt-3">
                                            <label>Avatar actuel</label>
                                            <div>
                                                <img src="{{ asset('storage/users/avatar/' . $user->avatar) }}"
                                                    alt="Avatar" class="img-thumbnail" width="150">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-12">
                                        <label>Informations personnelles</label>
                                        <textarea name="bio" rows="7" placeholder="Biographie">{{ old('bio', $user->bio) }}</textarea>
                                    </div>

                                    <div class="col-12">
                                        <button class="button -md -purple-1 text-white" type="submit">Mettre à jour mon
                                            profil</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tabs__pane -tab-item-2">
                              <form action="{{ route('password.update') }}" method="POST"
                                    class="contact-form row y-gap-30">
                                    @csrf
                                    <div class="col-md-7">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Current password</label>
                                        <input type="password" name="current_password" placeholder="Current password"
                                            required>
                                    </div>

                                    <div class="col-md-7">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">New password</label>
                                        <input type="password" name="new_password" placeholder="New password" required>
                                    </div>

                                    <div class="col-md-7">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Confirm New Password</label>
                                        <input type="password" name="new_password_confirmation"
                                            placeholder="Confirm New Password" required>
                                    </div>

                                    <div class="col-12">
                                        <button class="button -md -purple-1 text-white" type="submit">Save
                                            Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
