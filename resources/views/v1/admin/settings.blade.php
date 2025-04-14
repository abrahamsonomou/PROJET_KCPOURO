@extends('v1.admin.base')
@section('title', 'Parametres')
@section('isActive9')
active
@endsection
@section('content')
<div class="page-content-wrapper border">

<div class="row">
    <div class="col-12 mb-3">
        <h1 class="h3 mb-2 mb-sm-0">Admin Settings</h1>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-3">
        <ul class="nav nav-pills nav-tabs-bg-dark flex-column">
            <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tab-1"><i class="fas fa-globe fa-fw me-2"></i>Website Settings</a> </li>
            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-2"><i class="fas fa-user-circle fa-fw me-2"></i>Compte Utilisateur</a> </li>
            <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-3"><i class="fas fa-cog fa-fw me-2"></i>Sécurité</a> </li>
        </ul>
    </div>

    <div class="col-xl-9">

        <div class="tab-content">
{{-- 
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}

            <div class="tab-pane show active" id="tab-1">
                <div class="card shadow">

                    <div class="card-header border-bottom">
                        <h5 class="card-header-title">Website Settings</h5>
                    </div>

                    <div class="card-body">
                        <form class="row g-4 align-items-center" action="{{ route('admin.settings') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="col-lg-6">
                                <label class="form-label">Site Name</label>
                                <input type="text" class="form-control" name="site_name" value="{{ old('site_name', $parametre->site_name) }}">
                                <div class="form-text">Enter Website Name. It Display in Website and Email.</div>
                            </div>
                        
                            <div class="col-lg-6">
                                <label class="form-label">Site Copyrights</label>
                                <input type="text" name="copyright" class="form-control @error('copyright') is-invalid @enderror" value="{{ old('copyright', $parametre->copyright) }}">
                                @error('copyright') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                <div class="form-text">Using for Contact and Send Email.</div>
                            </div>

                            <div class="col-lg-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" value="{{ old('description', $parametre->description) }}" id="description" cols="30" rows="10"></textarea>
                                <div class="form-text">Short description of your site.</div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $parametre->email) }}">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                <div class="form-text">Main contact email.</div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Contact Phone</label>
                                <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone', $parametre->telephone) }}">
                                @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                <div class="form-text">Using for Contact and Support.</div>
                            </div>
                        
                            <div class="col-lg-6">
                                <label class="form-label">
                                    Facebook</label>
                                <input type="url" name="facebook_link" class="form-control @error('facebook_link') is-invalid @enderror" value="{{ old('facebook_link', $parametre->facebook_link) }}">
                                @error('facebook_link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        
                            <div class="col-lg-6">
                                <label for="twitter_link">Twitter</label>
                                <input type="url" name="twitter_link" class="form-control @error('twitter_link') is-invalid @enderror" value="{{ old('twitter_link', $parametre->twitter_link) }}">
                                @error('twitter_link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        
                            <div class="col-lg-6">
                                <label for="instagram_link">Instagram</label>
                                <input type="url" name="instagram_link" class="form-control @error('instagram_link') is-invalid @enderror" value="{{ old('instagram_link', $parametre->instagram_link) }}">
                                @error('instagram_link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        
                            <div class="col-lg-6">
                                <label for="linkedin_link">LinkedIn</label>
                                <input type="url" name="linkedin_link" class="form-control @error('linkedin_link') is-invalid @enderror" value="{{ old('linkedin_link', $parametre->linkedin_link) }}">
                                @error('linkedin_link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        
                            <div class="col-lg-6">
                                <label for="youtube_link">YouTube</label>
                                <input type="url" name="youtube_link" class="form-control @error('youtube_link') is-invalid @enderror" value="{{ old('youtube_link', $parametre->youtube_link) }}">
                                @error('youtube_link') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        
                            <div class="col-lg-6">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                                @if($parametre->logo)
                                    <img src="{{ asset('storage/' . $parametre->logo) }}" alt="Logo" height="50">
                                @endif
                                @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        
                            <div class="col-lg-6">
                                <label for="favicon">Favicon</label>
                                <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror">
                                @if($parametre->favicon)
                                    <img src="{{ asset('storage/' . $parametre->favicon) }}" alt="Favicon" height="20">
                                @endif
                                @error('favicon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        
                            <div class="col-lg-6">
                                <label for="logo_footer">Footer Logo</label>
                                <input type="file" name="logo_footer" class="form-control @error('logo_footer') is-invalid @enderror">
                                @if($parametre->logo_footer)
                                    <img src="{{ asset('storage/' . $parametre->logo_footer) }}" alt="Logo Footer" height="50">
                                @endif
                                @error('logo_footer') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="d-sm-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mb-0">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>			
            </div>

            <div class="tab-pane" id="tab-2">

                <div class="card shadow">

                    <div class="card-header border-bottom">
                        <h5 class="card-header-title">Mon compte utilisateur</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST"
                        class="contact-form row y-gap-30" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}"
                                placeholder="email">
                        </div>
                        {{-- <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                                placeholder="Name">
                        </div> --}}

                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control"
                                value="{{ old('first_name', $user->first_name) }}" placeholder="First Name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control"
                                value="{{ old('last_name', $user->last_name) }}" placeholder="Last Name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Telephone</label>
                            <input type="text" name="telephone" class="form-control"
                                value="{{ old('telephone', $user->telephone) }}" placeholder="Telephone">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" name="date_naissance"
                                value="{{ old('date_naissance', $user->date_naissance) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Adresse 1</label>
                            <input type="text" class="form-control" name="adresse1" value="{{ old('adresse1', $user->adresse1) }}"
                                placeholder="Adresse 1">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Adresse 2</label>
                            <input type="text" class="form-control" name="adresse2" value="{{ old('adresse2', $user->adresse2) }}"
                                placeholder="Adresse 2">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pays</label>
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
                            <label class="form-label">Ville</label>
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
                            <label class="form-label">Spécialité</label>
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
                            <label class="form-label">Avatar</label>
                            <input type="file" class="form-control" name="avatar" class="form-control">
                        </div>

                        @if ($user->avatar)
                            <div class="col-md-6 mt-3">
                                <label class="form-label">Avatar actuel</label>
                                <div>
                                    <img src="{{ asset('storage/users/avatar/' . $user->avatar) }}"
                                        alt="Avatar" class="img-thumbnail" width="150">
                                </div>
                            </div>
                        @endif

                        <div class="col-12 mt-4">
                            <label class="form-label">Informations personnelles</label>
                            <textarea name="bio" rows="7" class="form-control" placeholder="Biographie">{{ old('bio', $user->bio) }}</textarea>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary mb-0 mt-4" type="submit">Mettre à jour mon
                                profil</button>
                        </div>
                    </form>

                    </div>

                </div>
            </div>

            <div class="tab-pane" id="tab-3">
                <div class="card shadow">

                    <div class="card-header border-bottom">
                        <h5 class="card-header-title">Changement de mot de passe</h5>
                    </div>

                    <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST" >
                        @csrf

                            <div class="col-12">
                                <label class="form-label">Old Password <span class="text-danger">*</span></label>
                                <input type="Password" name="current_password" class="form-control" placeholder="Enter old password">
                            </div>

                    <div class="col-12 mb-3">
						<label class="form-label">New Passowrd <span class="text-danger">*</span></label>
						<input type="password" name="new_password" class="form-control" placeholder="Enter new passowrd">
					</div>

					<div class="col-12">
						<label class="form-label">Confirm Passowrd <span class="text-danger">*</span></label>
						<input type="password" name="new_password_confirmation" class="form-control" placeholder="Enter confirm passowrd">
					</div>
				    <button type="submit" class="btn btn-success my-0 mt-4">Change Password</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
