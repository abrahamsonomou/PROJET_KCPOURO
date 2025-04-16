@extends('v1.admin.base')
@section('title', 'Edit Course')
@section('isActive2')
    active
@endsection
@section('content')

    <div class="page-content-wrapper border">

        <!-- Title -->
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="h3 mb-2 mb-sm-0">Edit Course</h1>
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

                    <form class="row g-4 align-items-center" action="{{ route('admin.cours.update', $cours->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Course Title -->
                        <div class="col-lg-12">
                            <label for="titre">Title *</label>
                            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $cours->titre) }}" required>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $cours->description) }}</textarea>
                        </div>

                        <div class="col-12">
                            <label for="short_description">Resumé</label>
                            <textarea name="short_description" id="short_description" class="form-control" rows="5">{{ old('short_description', $cours->short_description) }}</textarea>
                        </div>

                        <!-- Category -->
                        <div class="col-lg-6">
                            <label class="form-label">Select Categorie *</label>
                            <select name="categorie_id" id="categorie_id" class="form-select js-choice z-index-9 border-0 bg-light" required>
                                <option value="">Select Categorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == old('categorie_id', $cours->categorie_id) ? 'selected' : '' }}>
                                        {{ $category->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Instructor -->
                        <div class="col-lg-6">
                            <label class="form-label">Select Instructor *</label>
                            <select name="user_id" id="user_id" class="form-select js-choice z-index-9 border-0 bg-light" required>
                                <option value="">Select Instructor</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}" {{ $instructor->id == old('user_id', $cours->user_id) ? 'selected' : '' }}>
                                        {{ $instructor->name }} ({{ $instructor->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price and Promo Price -->
                        <div class="col-lg-3">
                            <label class="form-label">Price *</label>
                            <input type="number" name="prix" class="form-control" value="{{ old('prix', $cours->prix) }}">
                        </div>

                        <div class="col-lg-3">
                            <label class="form-label">Promo Price *</label>
                            <input type="number" name="prix_promo" class="form-control" value="{{ old('prix_promo', $cours->prix_promo) }}">
                        </div>

                        <!-- Currency -->
                        <div class="col-lg-3">
                            <label class="form-label">Select Currency *</label>
                            <select name="devise_id" id="devise_id" class="form-select js-choice z-index-9 border-0 bg-light" required>
                                <option value="">Select Currency</option>
                                @foreach ($devises as $devise)
                                    <option value="{{ $devise->id }}" {{ $devise->id == old('devise_id', $cours->devise_id) ? 'selected' : '' }}>
                                        {{ $devise->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Duration and Lessons -->
                        <div class="col-md-3">
                            <label class="form-label">Duration *</label>
                            <input type="text" name="duree" placeholder="ex: 2h30" class="form-control" value="{{ old('duree', $cours->duree) }}">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Lessons *</label>
                            <input type="number" name="nombre_lesson" class="form-control" value="{{ old('nombre_lesson', $cours->nombre_lesson) }}">
                        </div>

                        <!-- Certificate -->
                        <div class="col-md-2">
                            <label class="form-label">Certificate *</label>
                            <select name="certificat" class="form-select js-choice z-index-9 border-0 bg-light">
                                <option value="1" {{ $cours->certificat == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $cours->certificat == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <label class="form-label">Nb Quizz *</label>
                            <input type="number" name="nombre_quizz" class="form-control" value="{{ old('nombre_quizz', $cours->nombre_quizz) }}">
                        </div>

                        <!-- Language -->
                        <div class="col-lg-6">
                            <label class="form-label">Select Language *</label>
                            <select name="langue_id" id="langue_id" class="form-select js-choice z-index-9 border-0 bg-light" required>
                                <option value="">Select Language</option>
                                @foreach ($langues as $langue)
                                    <option value="{{ $langue->id }}" {{ $langue->id == old('langue_id', $cours->langue_id) ? 'selected' : '' }}>
                                        {{ $langue->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Level -->
                        <div class="col-lg-6">
                            <label class="form-label">Select Level *</label>
                            <select name="niveau_id" id="niveau_id" class="form-select js-choice z-index-9 border-0 bg-light" required>
                                <option value="">Select Level</option>
                                @foreach ($niveaux as $niveau)
                                    <option value="{{ $niveau->id }}" {{ $niveau->id == old('niveau_id', $cours->niveau_id) ? 'selected' : '' }}>
                                        {{ $niveau->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image -->
                        <div class="col-lg-6">
                            <label for="image">Course Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if($cours->image)
                                <img src="{{ asset($cours->image) }}" alt="Course Image" class="mt-2" width="100">
                            @endif
                        </div>

                        <!-- Video URL -->
                        <div class="col-lg-6">
                            <label for="url_video">Video URL</label>
                            <input type="url" name="url_video" id="url_video" class="form-control" value="{{ old('url_video', $cours->url_video) }}">
                        </div>

                        <!-- Status -->
                        <div class="col-md-2">
                            <label class="form-label">Active *</label>
                            <select name="active" class="form-select js-choice z-index-9 border-0 bg-light">
                                <option value="1" {{ $cours->active == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $cours->active == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Top *</label>
                            <select name="top" class="form-select js-choice z-index-9 border-0 bg-light">
                                <option value="1" {{ $cours->top == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $cours->top == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <!-- Course Status -->
                        <div class="col-lg-4">
                            <label class="form-label">Course Status</label>
                            <div class="d-sm-flex">
                                <div class="form-check radio-bg-light me-4">
                                    <input class="form-check-input" type="radio" name="etat" id="nouveau" value="0" {{ $cours->etat == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nouveau">New</label>
                                </div>
                                <div class="form-check radio-bg-light">
                                    <input class="form-check-input" type="radio" name="etat" id="in_progress" value="1" {{ $cours->etat == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="in_progress">In Progress</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Requirements*</label>
                        
                        <div class="row">
                                {{-- Vérification si des prérequis existent --}}
                            @foreach ($prerequis as $item)
                                <div class="col-md-12 mb-1">
                                    <label>
                                        <input type="checkbox" name="prerequis[]" value="{{ $item->id }}">
                                            {{-- @if(in_array($item->id, old('prerequis', isset($cours) ? $cours->prerequis->pluck('id')->toArray() : []))) 
                                                checked 
                                            @endif> --}}
                                        {{ $item->nom }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                        

                        <div class="col-md-12">

                            <label class="form-label">Objectifs du cours*</label>
            
                            {{-- <textarea class="form-control" name="objectifs" value="{{ old('objectifs', htmlspecialchars($cours->objectifs)) }}"> placeholder="Description" rows="7"></textarea> --}}
                            <textarea class="form-control" name="objectifs" placeholder="Description" rows="7"></textarea>
                          </div>

                        <div class="row container my-4 d-flex justify-content-center">
                            <h5 class=" text-primary fs-4">Tags</h5>
                            @foreach ($tags as $tag)
                                <div class="col-md-2 mb-0">
                                    <label>
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @if(in_array($tag->id, old('tags', $cours->tags->pluck('id')->toArray()))) checked @endif>
                                        {{ $tag->nom }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-lg-12 mt-4">
                            <button type="submit" class="btn btn-primary">Update Course</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
