@extends('v1.admin.base')
@section('title', 'Course')
@section('isActive2')
    active
@endsection
@section('content')

    <div class="page-content-wrapper border">

        <!-- Title -->
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="h3 mb-2 mb-sm-0">Gestion des cours</h1>
            </div>
        </div>


        <div class="row g-4 ">

            <div class="card shadow">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <form class="row g-4 align-items-center" action="{{ route('admin.cours.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <label for="titre">Titre *</label>
                            <input type="text" name="titre" id="titre" class="form-control" required>
                        </div>

                        <!-- Textarea item -->
                        <div class="col-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="col-12">
                            <label for="short_description">Resumé</label>
                            <textarea name="short_description" id="short_description" class="form-control" rows="5"></textarea>
                        </div>


                        <div class="col-lg-6">
                            <label class="form-label">Select Categorie *</label>
                            <select name="categorie_id" id="categorie_id"
                                class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm" required>
                                <option value="">Select Categorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label">Select Instructor *</label>
                            <select name="user_id" id="user_id"  class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm" required>
                                <option value="">Select Instructor</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">{{ $instructor->name }} ({{ $instructor->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3">
                            <label class="form-label">Prix *</label>
                            <input type="number" name="prix" class="form-control">
                        </div>
            
                        <div class="col-lg-3">
                            <label class="form-label">Prix promo*</label>
                            <input type="number" name="prix_promo" class="form-control">
                        </div>

                        <div class="col-lg-3">
                            <label class="form-label">Select Devise *</label>
                            <select name="devise_id" id="devise_id"  class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm" required>
                                <option value="">Select Devise</option>
                                @foreach ($devises as $devise)
                                    <option value="{{ $devise->id }}">{{ $devise->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Duree *</label>
                            <input type="text" name="duree" placeholder="exemple: 2h30" class="form-control">
                          </div>
            
                          <div class="col-md-2">
                            <label class="form-label">Nb leçons *</label>
                            <input type="number" name="nombre_lesson" placeholder="" class="form-control">
                          </div>
            
                          <div class="col-md-2">
                            <label class="form-label">Certificate *</label>
                            <select name="certificat" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                          </div>
            
                          <div class="col-lg-2">
                            <label class="form-label">Nb Quizz *</label>
                            <input type="number" name="nombre_quizz" placeholder="" class="form-control">
                          </div>

                        <div class="col-lg-6">
                            <label class="form-label">Select Language *</label>
                            <select name="langue_id" id="langue_id" class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm" required>
                                <option value="">Select Language</option>
                                @foreach ($langues as $langue)
                                    <option value="{{ $langue->id }}">{{ $langue->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label">Select Level *</label>
                            <select name="niveau_id" id="niveau_id"  class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm" required>
                                <option value="">Select Level</option>
                                @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label for="image">Course Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="col-lg-6">
                            <label for="url_video">Video URL</label>
                            <input type="url" name="url_video" id="url_video" class="form-control">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Active *</label>
                            <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                          </div>

                          <div class="col-md-2">
                            <label class="form-label">Top *</label>
                            <select name="top" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                          </div>

                        <div class="col-lg-6">
                            <label class="form-label">Statut du cours</label>
                            <div class="d-sm-flex">
                                <!-- Radio -->
                                <div class="form-check radio-bg-light me-4">
                                    <input class="form-check-input" type="radio" name="etat"
                                        id="nouveau" value="0" checked>
                                    <label class="form-check-label" for="nouveau">
                                        Nouveau
                                    </label>
                                </div>
                                <!-- Radio -->
                                <div class="form-check radio-bg-light me-4">
                                    <input class="form-check-input" type="radio" name="etat"
                                        id="approuver" value="1">
                                    <label class="form-check-label" for="approuver">
                                        Approuver
                                    </label>
                                </div>
                                <!-- Radio -->
                                <div class="form-check radio-bg-light">
                                    <input class="form-check-input" type="radio" name="etat"
                                        id="annuler" value="2">
                                    <label class="form-check-label" for="annuler">
                                        Annuler
                                    </label>
                                </div>
                            </div>
                        </div>         
            
                    <div class="col-md-6">
            
                            <label class="form-label">Prerequis du cours*</label>
                            {{-- <textarea class="form-control" name="objectifs" placeholder="Description" rows="7"></textarea> --}}
                        <div class="row">
                            @foreach ($prerequis as $item)
                            <div class="col-md-12 mb-1">
                                <label>
                                    <input type="checkbox" name="prerequis[]" value="{{ $item->id }}">
                                    {{ $item->nom }}
                                </label>
                            </div>
                            @endforeach

                        </div>
                    </div>

                          <div class="col-md-12">

                            <label class="form-label">Objectifs du cours*</label>
            
                            <textarea class="form-control" name="objectifs" placeholder="Description" rows="7"></textarea>
                          </div>

                        <hr>
                        <div class="row container my-4 d-flex justify-content-center">
                            <h5 class=" text-primary fs-4">Tags</h5>
                            @foreach ($tags as $tag)
                                <div class="col-md-3 mb-1">
                                    <label>
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                        {{ $tag->nom }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Save button -->
                        <div class="d-sm-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mb-0">Enregistrer</button>
                    <a href="{{ route('admin.cours.list') }}" class="btn btn-secondary mb-0">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- Card body END -->

            </div>

        </div>
    </div>

@endsection
