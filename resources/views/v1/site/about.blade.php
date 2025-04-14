@extends('v1.site.base')
@section('title', 'About')
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
              <a href="{{ route('about') }}">About</a>
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

            <h1 class="page-header__title">About Us</h1>
            {{-- <h2>{{ __('messages.welcome') }}</h2> --}}
          </div>

          <div data-anim="slide-up delay-2">

            {{-- <p class="page-header__text">We’re on a mission to deliver engaging, curated courses at a reasonable price.</p> --}}

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="layout-pt-md layout-pb-md">
  <div class="container">
    <div class="row y-gap-30 justify-between items-center">

      <div class="col-xl-5 col-lg-6 col-md-9 lg:order-2">

        <h3 class="text-45 md:text-30 lh-12"><span class="text-purple-1">KPC-OURO</span> le partenaire de choix <br class="lg:d-none"> pour les entreprises.</h3>
        <p class="text-dark-1 mt-30">KPC-OURO est un Cabinet spécialisé dans l'accompagnement stratégique et opérationnel des entreprises, avec pour objectif de les aider à atteindre une performance optimale à travers une large gamme de services. </p>
        <p class="pr-50 lg:pr-0 mt-25">Ces services sont conçus pour répondre aux besoins variés des organisations en matière de développement, d'optimisation et de gestion des ressources.</p>
      
        <div class="d-inline-block mt-30">
          <a href="{{ route('register') }}" class="button -md -dark-1 text-white">Nous rejoindre</a>
        </div>


      </div>

      <div class="col-lg-6 lg:order-1">
        <div class="composition -type-3">
          {{-- <div class="-el-1">
            <div class="bg-dark-1 py-50 px-30 rounded-8">
              <div class="y-gap-20 pt-25">

                <div class="d-flex items-center">
                  <div class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                    <i class="text-white size-12" data-feather="check"></i>
                  </div>
                  <div class="fw-500 text-white">Hand-picked authors</div>
                </div>

                <div class="d-flex items-center">
                  <div class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                    <i class="text-white size-12" data-feather="check"></i>
                  </div>
                  <div class="fw-500 text-white">Easy to follow curriculum</div>
                </div>

                <div class="d-flex items-center">
                  <div class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                    <i class="text-white size-12" data-feather="check"></i>
                  </div>
                  <div class="fw-500 text-white">Free courses</div>
                </div>

                <div class="d-flex items-center">
                  <div class="d-flex items-center justify-center size-25 rounded-full bg-purple-1 mr-15">
                    <i class="text-white size-12" data-feather="check"></i>
                  </div>
                  <div class="fw-500 text-white">Money-back guarantee</div>
                </div>

              </div>
            </div>
          </div> --}}
          <div class="-el-2">
            <img class="w-1/1" src="{{ asset('assets/images/learn/1.png') }}" alt="image">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="layout-pt-md layout-pb-lg">
  <div class="container">
    <div class="row y-gap-20 justify-center text-center">
      <div class="col-auto">

        <div class="sectionTitle ">

          <h2 class="sectionTitle__title ">How it works?</h2>

          <p class="sectionTitle__text ">10,000+ unique online course list designs</p>

        </div>

      </div>
    </div>

    <div class="row y-gap-30 justify-between pt-60 lg:pt-40">

      <div class="col-xl-2 col-lg-3 col-md-6">
        <div class="d-flex flex-column items-center text-center">
          <div class="relative size-120 d-flex justify-center items-center rounded-full bg-light-4">
            <img src="{{ asset('assets/images/works/1.svg') }}" alt="image">
            <div class="side-badge">
              <div class="size-35 d-flex justify-center items-center rounded-full bg-dark-1 -dark-bg-purple-1">
                <span class="text-14 fw-500 text-white">01</span>
              </div>
            </div>
          </div>
          <div class="text-17 fw-500 text-dark-1 mt-30">Browse courses from our expert contributors.</div>
        </div>
      </div>


      <div class="col-auto xl:d-none">
        <div class="pt-30">
          <img src="{{ asset('assets/images/lines/1.svg') }}" alt="icon">
        </div>
      </div>


      <div class="col-xl-2 col-lg-3 col-md-6">
        <div class="d-flex flex-column items-center text-center">
          <div class="relative size-120 d-flex justify-center items-center rounded-full bg-light-4">
            <img src="{{ asset('assets/images/works/2.svg') }}" alt="image">
            <div class="side-badge">
              <div class="size-35 d-flex justify-center items-center rounded-full bg-dark-1 -dark-bg-purple-1">
                <span class="text-14 fw-500 text-white">02</span>
              </div>
            </div>
          </div>
          <div class="text-17 fw-500 text-dark-1 mt-30">Purchase quickly and securely.</div>
        </div>
      </div>


      <div class="col-auto xl:d-none">
        <div class="pt-30">
          <img src="{{ asset('assets/images/lines/2.svg') }}" alt="icon">
        </div>
      </div>


      <div class="col-xl-2 col-lg-3 col-md-6">
        <div class="d-flex flex-column items-center text-center">
          <div class="relative size-120 d-flex justify-center items-center rounded-full bg-light-4">
            <img src="{{ asset('assets/images/works/3.svg') }}" alt="image">
            <div class="side-badge">
              <div class="size-35 d-flex justify-center items-center rounded-full bg-dark-1 -dark-bg-purple-1">
                <span class="text-14 fw-500 text-white">03</span>
              </div>
            </div>
          </div>
          <div class="text-17 fw-500 text-dark-1 mt-30">That’s it! Start learning right away.</div>
        </div>
      </div>


    </div>
  </div>
</section>

@if($nos_partenaires->count() > 0)
<section class="layout-pt-md layout-pb-lg">
  <div data-anim-wrap class="container">
    {{-- <div class="row justify-center">
      <div class="col text-center">
        <p class="text-lg text-dark-1">Nos nos_partenaires</p>
      </div>
    </div> --}}

    <div class="row y-gap-30 justify-between sm:justify-start items-center pt-60 md:pt-50">

      @foreach ($nos_partenaires as $partenaire)

      <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-2 col-sm-3 col-4">
        <div class="d-flex justify-center items-center px-4">
          <img class="w-1/1" src="{{ asset('storage/' . $partenaire->logo) }}" alt="{{ $partenaire->nom }}">
        </div>
      </div>

    @endforeach
    </div>
  </div>
</section>
@endif


@endsection
