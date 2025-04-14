@extends('v1.instructors.base')
@section('title', 'My courses')
@section('isActive2')
-is-active -dark-bg-dark-2
@endsection
@section('content')
<div class="dashboard__content bg-light-4">
  <div class="row pb-50 mb-10">
    <div class="col-auto">

      <h1 class="text-30 lh-12 fw-700">Mes cours</h1>
    </div>
  </div>

  @if ($course->count() >0)
      
  <div class="row y-gap-30">
    <div class="col-12">
      <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">

        <div class="py-30 px-30">
          <div class="row y-gap-30">

            @foreach($course as $cours)
            
            <div class="col-xl-6">
              <a href="#" class="relative d-block rounded-8 px-10 py-10 border-light">
                <div class="row x-gap-20 y-gap-20 items-center">
                  <div class="col-md-auto">
                    <div class="shrink-0">
                      <img class="w-1/1" src="{{ asset('storage/' . $cours->image) }}" alt="image">
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="absolute-bookmark -dark-bg-dark-2 shadow-5">
                      <i class="icon-bookmark"></i>
                    </div>

                    {{-- <div class="d-flex items-center">
                      <div class="text-14 lh-1 fw-500 text-yellow-1 mr-10">4.5</div>
                      <div class="d-flex x-gap-5 items-center">
                        <i class="icon-star text-9 text-yellow-1"></i>
                        <i class="icon-star text-9 text-yellow-1"></i>
                        <i class="icon-star text-9 text-yellow-1"></i>
                        <i class="icon-star text-9 text-yellow-1"></i>
                        <i class="icon-star text-9 text-yellow-1"></i>
                      </div>
                      <div class="text-13 lh-1 fw-500 ml-10">(1991))</div>
                    </div> --}}

                    <h3 class="text-17 lh-16 fw-500 mt-10 pr-40 xl:pr-0">{{ $cours->titre }}</h3>

                    <div class="d-flex x-gap-20 y-gap-5 items-center flex-wrap pt-10">

                      <div class="d-flex items-center">
                        <div class="mr-10">
                          <img src="{{ asset('assets/img/coursesCards/icons/1.svg') }}" alt="icon">
                        </div>
                        <div class="text-14 lh-1">{{ $cours->nombre_lesson }} lesson</div>
                      </div>

                      <div class="d-flex items-center">
                        <div class="mr-10">
                          <img src="{{ asset('assets/img/coursesCards/icons/2.svg') }}" alt="icon">
                        </div>
                        <div class="text-14 lh-1">{{ $cours->duree }}</div>
                      </div>

                      <div class="d-flex items-center">
                        <div class="mr-10">
                          <img src="{{ asset('assets/img/coursesCards/icons/3.svg') }}" alt="icon">
                        </div>
                        <div class="text-14 lh-1">{{ $cours->niveau->nom }}</div>
                      </div>

                    </div>

                    <div class="d-flex y-gap-10 justify-between items-center flex-wrap border-top-light pt-10 mt-10">
                      <div class="d-flex items-center">
                        <img  src="{{ $cours->user->avatar ? asset('storage/users/avatar/' . $cours->user->avatar) : asset('assets/img/general/avatar-1.png') }}" alt="image">
                        <div class="text-14 lh-1 ml-10">{{ $cours->user->first_name ?? '' }} {{ $cours->user->last_name ?? '' }}</div>
                      </div>

                      <div class="d-flex items-center">
                        <div class="line-through lh-1 fw-500 mr-10">{{ $cours->prix }} {{ $cours->devise->code_iso }}</div>
                        <div class="text-18 lh-1 fw-500 text-dark-1">{{ $cours->prix_promo }} {{ $cours->devise->code_iso }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            @endforeach

          <div class="row justify-center pt-30">
            <div class="col-auto">
                <div class="pagination -buttons">
                    {{-- Bouton Précédent --}}
                    @if ($course->onFirstPage())
                        <button class="pagination__button -prev" disabled>
                            <i class="icon icon-chevron-left"></i>
                        </button>
                    @else
                        <a href="{{ $course->previousPageUrl() }}" class="pagination__button -prev">
                            <i class="icon icon-chevron-left"></i>
                        </a>
                    @endif
        
                    {{-- Liens des pages --}}
                    <div class="pagination__count">
                        @foreach ($course->links()->elements[0] as $page => $url)
                            @if ($page == $course->currentPage())
                                <a class="-count-is-active" href="{{ $url }}">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach
                    </div>
        
                    {{-- Bouton Suivant --}}
                    @if ($course->hasMorePages())
                        <a href="{{ $course->nextPageUrl() }}" class="pagination__button -next">
                            <i class="icon icon-chevron-right"></i>
                        </a>
                    @else
                        <button class="pagination__button -next" disabled>
                            <i class="icon icon-chevron-right"></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
  @endif

</div>

@endsection
