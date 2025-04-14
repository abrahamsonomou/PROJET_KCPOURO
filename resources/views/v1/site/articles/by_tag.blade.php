@extends('v1.site.base')
@section('title', 'Blog by Tag')
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
              <a href="{{ route('blog') }}">Blog</a>
            </div>

            <div class="breadcrumbs__item ">
              <a href="">{{ $tag->nom }}</a>
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

              <h1 class="page-header__title">Articles with Tag: {{ $tag->nom }}</h1>

            </div>

            <div data-anim="slide-up delay-2">

              {{-- <p class="page-header__text">We’re on a mission to deliver engaging, curated courses at a reasonable price.</p> --}}

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="layout-pt-sm layout-pb-lg">
    <div data-anim-wrap class="container">
      <div class="tabs -pills js-tabs">

        <div class="tabs__content pt-40 js-tabs-content">

          <div class="tabs__pane -tab-item-1 is-active">
            <div class="row y-gap-30">

            @if($articles->isEmpty())
                <p>No articles found with this tag.</p>
            @else
            @foreach($articles as $article)
              <div data-anim-child="slide-up delay-4" class="col-lg-4 col-md-6">
                <a href="{{ route('blog-details', $article->id) }}" class="blogCard -type-1">
                  <div class="blogCard__image">
                    <img class="w-1/1 rounded-8" src="{{ asset('storage/' . $article->image) }}" alt="image">
                  </div>
                  <div class="blogCard__content mt-20">
                    <div class="blogCard__category">{{ $article->categorie->nom }}</div>
                    <h4 class="blogCard__title text-20 lh-15 fw-500 mt-5">{{ Str::limit($article->titre, 40) }}</h4>
                    <div class="blogCard__date text-14 mt-5">{{ Str::limit($article->created_at, 10) }}</div>
                  </div>
                </a>
              </div>
              @endforeach
              @endif

            </div>

            <div class="row justify-center pt-60 lg:pt-40">
              <div class="col-auto">
                <div class="pagination -buttons">
                  <button class="pagination__button -prev">
                    <i class="icon icon-chevron-left"></i>
                  </button>

                  <div class="pagination__count">
                    <a href="#">1</a>
                    <a class="-count-is-active" href="#">2</a>
                    <a href="#">3</a>
                    <span>...</span>
                    <a href="#">67</a>
                  </div>

                  <button class="pagination__button -next">
                    <i class="icon icon-chevron-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

@endsection
