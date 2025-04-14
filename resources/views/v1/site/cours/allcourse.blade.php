@extends('v1.site.base')
@section('title', 'Cours')
@section('content')

    <section data-anim="fade" class="breadcrumbs ">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="breadcrumbs__content">

                        <div class="breadcrumbs__item ">
                            <a href="{{ route('home') }}">Home</a>
                        </div>

                        <div class="breadcrumbs__item ">
                            <a href="{{ route('cours') }}">Cours</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">

                    @if($cours->count() > 0)
                        <div data-anim="slide-up delay-1">
                            <h1 class="page-header__title">Parcourir nos cours</h1>
                        </div>
                        <div data-anim="slide-up delay-2">
                            <p class="page-header__text">Le cabinet KCP OURO vous propose des cours axés sur la demande du marché de l'emplois</p>
                        </div>
                    @else
                                                
                        <div data-anim="slide-up delay-1">
                            <h1 class="page-header__title text-center">Aucun cours disponible.</h1>
                            <br>
                            <br>
                        </div>
                        
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($cours->count() > 0)

    <section class="layout-pt-md layout-pb-lg">
        <div data-anim="slide-up delay-2" class="container">
            <div class="row y-gap-30">
                @foreach ($cours as $item)
                <div class="col-xl-3 col-lg-4 col-md-6">

                    <a href="{{ route('cours.details', $item->id) }}" class="coursesCard -type-1 ">
                        <div class="relative">
                            <div class="coursesCard__image overflow-hidden rounded-8">
                                <img class="w-1/1" src="{{ asset('storage/' . $item->image) }}" alt="image">
                                <div class="coursesCard__image_overlay rounded-8"></div>
                            </div>
                            <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                            </div>
                        </div>

                        <div class="h-100 pt-15">
                            {{-- <div class="d-flex items-center">
                                <div class="text-14 lh-1 text-yellow-1 mr-10">4.5</div>
                                <div class="d-flex x-gap-5 items-center">
                                    <div class="icon-star text-9 text-yellow-1"></div>
                                    <div class="icon-star text-9 text-yellow-1"></div>
                                    <div class="icon-star text-9 text-yellow-1"></div>
                                    <div class="icon-star text-9 text-yellow-1"></div>
                                    <div class="icon-star text-9 text-yellow-1"></div>
                                </div>
                                <div class="text-13 lh-1 ml-10">(1991)</div>
                            </div> --}}

                            <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{ $item->titre }}</div>

                            <div class="d-flex x-gap-10 items-center pt-10">

                                <div class="d-flex items-center">
                                    <div class="mr-8">
                                        <img src="assets/img/coursesCards/icons/1.svg" alt="icon">
                                    </div>
                                    <div class="text-14 lh-1">{{ $item->nombre_lesson }} lesson</div>
                                </div>

                                <div class="d-flex items-center">
                                    <div class="mr-8">
                                        <img src="assets/img/coursesCards/icons/2.svg" alt="icon">
                                    </div>
                                    <div class="text-14 lh-1">{{ $item->duree }}</div>
                                </div>

                                <div class="d-flex items-center">
                                    <div class="mr-8">
                                        <img src="assets/img/coursesCards/icons/3.svg" alt="icon">
                                    </div>
                                    <div class="text-14 lh-1">{{ $item->niveau->nom }}</div>
                                </div>

                            </div>

                            <div class="coursesCard-footer">
                                <div class="coursesCard-footer__author">
                                  <img src="{{ $item->user->avatar ? asset('storage/users/avatar/' . $item->user->avatar) : asset('assets/img/general/avatar-1.png') }}" alt="image">
                                  <div>{{ $item->user->first_name ?? 'Instructor' }} {{ $item->user->last_name ?? '' }}</div>
                                </div>
                      
                                <div class="coursesCard-footer__price">
                                  <div>{{ $item->prix }} {{ $item->devise->nom_court }}</div>
                                  <div>{{ $item->prix_promo }} {{ $item->devise->nom_court }}</div>
                                </div>
                              </div>
                        </div>
                    </a>

                </div>
                @endforeach   

            </div>

            <div class="row justify-center pt-60 lg:pt-40">
                <div class="col-auto">
                    <div class="pagination -buttons">
                        {{-- Bouton Précédent --}}
                        @if ($cours->onFirstPage())
                            <button class="pagination__button -prev" disabled>
                                <i class="icon icon-chevron-left"></i>
                            </button>
                        @else
                            <a href="{{ $cours->previousPageUrl() }}" class="pagination__button -prev">
                                <i class="icon icon-chevron-left"></i>
                            </a>
                        @endif
            
                        {{-- Liens des pages --}}
                        <div class="pagination__count">
                            @foreach ($cours->links()->elements[0] as $page => $url)
                                @if ($page == $cours->currentPage())
                                    <a class="-count-is-active" href="{{ $url }}">{{ $page }}</a>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach
                        </div>
            
                        {{-- Bouton Suivant --}}
                        @if ($cours->hasMorePages())
                            <a href="{{ $cours->nextPageUrl() }}" class="pagination__button -next">
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
    </section>

    @endif

@endsection
