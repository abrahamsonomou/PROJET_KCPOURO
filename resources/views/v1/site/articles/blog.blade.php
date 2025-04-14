@extends('v1.site.base')
@section('title', 'Blog')
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
                            <a href="{{ route('blog') }}">Articles</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">
                             @if($articles->count() > 0)
                            <h1 class="page-header__title">Nos derniers Articles</h1>
                                @else
                            <h1 class="page-header__title mb-4">Aucun article disponible</h1>
                            <br>
                            @endif
                        </div>

                        <div data-anim="slide-up delay-2">

                            {{-- <p class="page-header__text">We’re on a mission to deliver engaging, curated courses at a reasonable price.</p> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($articles->count() > 0)
        <section class="layout-pt-md layout-pb-lg">
            <div data-anim-wrap class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row y-gap-30">

                            @foreach ($articles as $article)
                                <div data-anim-child="slide-up delay-3" class="col-lg-4 col-md-6">
                                    <a href="{{ route('blog-details', $article->id) }}" class="blogCard -type-1">
                                        <div class="blogCard__image">
                                            <img class="w-1/1 rounded-8" src="{{ asset('storage/' . $article->image) }}"
                                                alt="image">
                                        </div>
                                        <div class="blogCard__content mt-20">
                                            <div class="blogCard__category"> {{ $article->categorie->nom }}</div>
                                            <h4 class="blogCard__title text-18 lh-15 fw-500 mt-5">
                                                {{ Str::limit($article->titre, 40) }}</h4>
                                            <div class="blogCard__date mt-5">{{ \Carbon\Carbon::parse($article->created_at)->locale('fr')->translatedFormat('d F Y') }}
                                                {{-- December 16, 2022 --}}
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
                                    @if ($articles->onFirstPage())
                                        <button class="pagination__button -prev" disabled>
                                            <i class="icon icon-chevron-left"></i>
                                        </button>
                                    @else
                                        <a href="{{ $articles->previousPageUrl() }}" class="pagination__button -prev">
                                            <i class="icon icon-chevron-left"></i>
                                        </a>
                                    @endif
                        
                                    {{-- Liens des pages --}}
                                    <div class="pagination__count">
                                        @foreach ($articles->links()->elements[0] as $page => $url)
                                            @if ($page == $articles->currentPage())
                                                <a class="-count-is-active" href="{{ $url }}">{{ $page }}</a>
                                            @else
                                                <a href="{{ $url }}">{{ $page }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                        
                                    {{-- Bouton Suivant --}}
                                    @if ($articles->hasMorePages())
                                        <a href="{{ $articles->nextPageUrl() }}" class="pagination__button -next">
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

                    @if($articles->count() > 0)
                    <div class="col-lg-3">

                        <div data-anim="slide-up delay-3" class="sidebar -blog">
                            <div class="sidebar__item">
                                <h5 class="sidebar__title">Categories</h5>

                                <div class="sidebar-content -list">

                                    @foreach ($categories as $categorie)
                                        <a class="text-dark-1" href="#">{{ $categorie->nom }}
                                            ({{ $categorie->articles_count }})</a>
                                    @endforeach

                                </div>
                            </div>

                            <div class="sidebar__item">
                                <h5 class="sidebar__title">Recent Posts</h5>

                                <div class="sidebar-content -recent y-gap-20">


                                    @foreach ($articles_recent as $article)
                                        <div class="sidebar-recent d-flex items-center">
                                            <div class="sidebar-recent__image mr-15">
                                                <img src="{{ asset('storage/' . $article->image) }}" alt="image">
                                            </div>

                                            <div class="sidebar-recent__content">
                                                <h5 class="text-15 lh-15 fw-500">{{ Str::limit($article->titre, 20) }}</h5>
                                                <div class="text-13 lh-1 mt-5">{{ \Carbon\Carbon::parse($article->created_at)->locale('fr')->translatedFormat('d F Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="sidebar__item">
                                <h5 class="sidebar__title">Tags</h5>

                                <div class="sidebar-content -tags">


                                    @foreach ($tags as $tag)
                                        <div class="sidebar-tag">
                                            <a class="text-11 fw-500 text-dark-1"
                                                href="{{ route('tags.articles', $tag->id) }}">{{ $tag->nom }}</a>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>

                    </div>
                    @endif

                </div>
            </div>
        </section>
    @endif

@endsection
