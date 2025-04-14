@extends('v1.instructors.base')
@section('title', 'Create articles')
@section('isActive7')
-is-active -dark-bg-dark-2
@endsection
@section('content')

<div class="dashboard__content bg-light-4">
    <div class="row pb-50 mb-10">
      <div class="col-auto">

        <h1 class="text-30 lh-12 fw-700">Create New Article</h1>

      </div>
    </div>


    <div class="row y-gap-60">
      <div class="col-12">
        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
          <div class="d-flex items-center py-20 px-30 border-bottom-light">
            <h2 class="text-17 lh-1 fw-500">Basic Information</h2>
          </div>

          <div class="py-30 px-30">
            <form class="contact-form row y-gap-30" action="{{ route('instructors.articles.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-12">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Titre *</label>

                <input type="text" name="titre" placeholder="Titre de l'article">
              </div>


              <div class="col-12">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Article Description*</label>
                <textarea placeholder="Description" name="description" rows="7" required></textarea>
              </div>


              <div class="col-md-6">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Select Categorie *</label>
                <select name="categorie_id" id="categorie_id" class="form-select js-choice z-index-9 border-0 bg-light"
                aria-label=".form-select-sm" required>
                <option value="">Select Categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nom }}</option>
                @endforeach
            </select>
              </div>

              <div class="col-md-6">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Image*</label>
                <input type="file" name="image" id="image" required>
              </div>

              <div class="col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Active*</label>
                <select name="active" id="" class="form-select js-choice z-index-9 border-0 bg-light">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
              </div>


            <div class="row y-gap-20 justify-between pt-15">
              <div class="col-auto">
                <button type="submit" class="button -md -purple-1 text-white">Enregistrer</button>
                <a href="{{ route('instructors.my_articles') }}" class="btn btn-secondary">Back to List</a>
              </div>
            </div>
          </form>

          </div>
        </div>
      </div>

    </div>

  </div>
  
@endsection
