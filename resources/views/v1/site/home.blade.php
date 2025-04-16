<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

  <title>Acceuil | {{ $parametre->site_name ?? 'KPC OURO' }}</title>
</head>


<body class="preloader-visible" data-barba="wrapper">
  <div class="preloader js-preloader">
    <div class="preloader__bg"></div>
  </div>

  <main class="main-content  ">

    <header data-anim="fade" data-add-bg="bg-dark-1" class="header -type-5 js-header">

      <div class="d-flex items-center bg-purple-1 py-10">
        <div class="container">
          <div class="row y-gap-5 justify-between items-center">
            <div class="col-auto">
              <div class="d-flex x-gap-40 y-gap-10 items-center">

                {{-- @if ({{ $parametre->telephone }}) --}}
                <div class="d-flex items-center text-white md:d-none">
                  <div class="icon-email mr-10"></div>
                  <div class="text13 lh-1">{{ $parametre->telephone ?? '' }}</div>
                </div>
                {{-- @endif --}}

                <div class="d-flex items-center text-white">
                  <div class="icon-email mr-10"></div>
                  <div class="text13 lh-1"><a href="mailto:{{ $parametre->email ?? '#' }}">{{ $parametre->email ?? '' }}</a></div>
                </div>

              </div>
            </div>

            <div class="col-auto">
              <div class="d-flex x-gap-30 y-gap-10">
                <div>
                  <div class="d-flex x-gap-20 items-center text-white">
                    <a href="{{ $parametre->facebook_link ?? '#' }}" target="_blank"><i class="icon-facebook text-11"></i></a>
                    <a href="{{ $parametre->twitter_link ?? '#' }}" target="_blank"><i class="icon-twitter text-11"></i></a>
                    <a href="{{ $parametre->instagram_link ?? '#' }}" target="_blank"><i class="icon-instagram text-11"></i></a>
                    <a href="{{ $parametre->linkedin_link ?? '#' }}" target="_blank"><i class="icon-linkedin text-11"></i></a>
                  </div>
                </div>

          
                <div class="d-flex items-center text-white text-13 sm:d-none">
                  English | Français
                   {{-- <i class="icon-chevron-down text-9 ml-10"></i> --}}
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container py-10">
        <div class="row justify-between items-center">

          <div class="col-auto">
            <div class="header-left">

              <div class="header__logo ">
                <a data-barba href="{{ route('home') }}">
                  {{-- si c'est null --}}
                  <img src="{{ asset($parametre->logo) }}" alt="logo">

                </a>
              </div>

            </div>
          </div>


          <div class="col-auto">
            <div class="header-right d-flex items-center">

              <div class="header-menu js-mobile-menu-toggle ">
                <div class="header-menu__content">
                  <div class="mobile-bg js-mobile-bg"></div>

                  <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                    @guest
                      <a href="{{ route('login') }}" class="text-dark-1">Log in</a>
                      <a href="{{ route('register') }}" class="text-dark-1 ml-30">Sign Up</a>
                    @else
                      <a href="{{ route('dashboard') }}" class="text-dark-1">Mon Espace</a>
                      <a href="{{ route('logout') }}" class="text-dark-1 ml-30">Deconnexion</a>
                    @endguest
                    </div>


                  <div class="menu js-navList">
                    <ul class="menu__nav text-white -is-active">

                      <li> <a data-barba href="{{ route('home') }}">Acceuil</a></li>

                      <li> <a data-barba href="{{ route('about') }}">A propos</a></li>
                      <li> <a data-barba href="{{ route('services') }}">Nos Services</a></li>

                      <li> <a data-barba href="{{ route('cours') }}">Cours</a></li>

                      <li> <a data-barba href="{{ route('blog') }}">Blog</a></li>
      
                      <li class="menu-item-has-children">
                        <a data-barba href="#">Ressources<i class="icon-chevron-right text-13 ml-10"></i></a>
                        <ul class="subnav">
                          <li class="menu__backButton js-nav-list-back">
                            <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Ressources</a>
                          </li>

                          <li><a href="javascript:void()">Ressources 1</a></li>

                          <li><a href="javascript:void()">Ressources 2</a></li>

                        </ul>
                      </li>

                      <li> <a data-barba href="{{ route('contact') }}">Contact</a></li>
                    </ul>

                  </div>

                  <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                    <div class="mobile-footer__number">
                      <div class="text-17 fw-500 text-dark-1">Telephone</div>
                      <div class="text-17 fw-500 text-purple-1">{{ $parametre->telephone ?? 'N/A' }}</div>
                    </div>

                    <div class="lh-2 mt-10">
                      <div>{{ $parametre->description ?? '' }}</div>
                      <div><a href="mailto:{{ $parametre->email ?? '#' }}">{{ $parametre->email ?? 'N/A' }}</a></div>
                    </div>

                    <div class="mobile-socials mt-10">

                      <a href="{{ $parametre->facebook_link ?? '#' }}" class="d-flex items-center justify-center rounded-full size-40" target="_blank">
                        <i class="fa fa-facebook"></i>
                      </a>
                      
                      <a href="{{ $parametre->twitter_link ?? '#' }}" class="d-flex items-center justify-center rounded-full size-40" target="_blank">
                        <i class="fa fa-twitter"></i>
                      </a>
                      
                      <a href="{{ $parametre->instagram_link ?? '#' }}" class="d-flex items-center justify-center rounded-full size-40" target="_blank">
                        <i class="fa fa-instagram"></i>
                      </a>
                      
                      <a href="{{ $parametre->linkedin_link ?? '#' }}" class="d-flex items-center justify-center rounded-full size-40" target="_blank">
                        <i class="fa fa-linkedin"></i>
                      </a>
                      
                      <a href="{{ $parametre->youtube_link ?? '#' }}" class="d-flex items-center justify-center rounded-full size-40" target="_blank">
                        <i class="fa fa-youtube"></i>
                      </a>
                      

                    </div>
                  </div>
                </div>

                <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                  <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                    <div class="icon-close text-dark-1 text-16"></div>
                  </div>
                </div>

                <div class="header-menu-bg"></div>
              </div>


              <div class="header-right__icons text-white d-flex items-center ml-30">

                <div class="d-none xl:d-block ml-20">
                  <button class="text-white items-center" data-el-toggle=".js-mobile-menu-toggle">
                    <i class="text-11 icon icon-mobile-menu"></i>
                  </button>
                </div>

              </div>
              @guest
              <div class="header-right__buttons d-flex items-center ml-30 xl:ml-20 md:d-none">
                <a href="{{ route('login') }}" class="button -underline text-white">Log in</a>
                <a href="{{ route('register') }}" class="button px-25 h-50 -white text-dark-1 -rounded ml-30 xl:ml-20">Sign Up</a>
              </div>
              @else
              <a href="{{ route('dashboard') }}" class="button -underline text-white">Mon Espace</a>
              <a href="{{ route('logout') }}" class="button px-25 h-50 -white text-dark-1 -rounded ml-30 xl:ml-20">Deconnexion</a>
              @endguest
            
            </div>
          </div>

        </div>
      </div>
    </header>


    <div class="content-wrapper  js-content-wrapper">
      <section data-anim-wrap class="mainSlider -type-1 js-mainSlider">
        <div class="swiper-wrapper">

          @if($nos_slides->count() > 0)
          @foreach ($nos_slides as $slide)
          
            <div class="swiper-slide">
              <div data-anim-child="fade" class="mainSlider__bg">
                <div class="bg-image js-lazy" data-bg="{{ asset($slide->image) }}"></div>
              </div>
            </div>
          @endforeach
          @else
          <div class="swiper-slide">
            <div data-anim-child="fade" class="mainSlider__bg">
              <div class="bg-image js-lazy" data-bg="{{ asset('assets/images/bg.png') }}"></div>
            </div>
          </div>
          @endif
        </div>

        <div class="container">
          <div class="row justify-center text-center">
            <div class="col-xl-6 col-lg-8">
              <div class="mainSlider__content">
                <h1 data-anim-child="slide-up delay-3" class="mainSlider__title text-white">
                  Bienvenue sur le site du Cabinet <span class="text-green-1 underline">KCP OURO</span>
                </h1>

                {{-- <p data-anim-child="slide-up delay-4" class="mainSlider__text text-white">
                  More than 6.500 online courses
                </p> --}}

                <div data-anim-child="slide-up delay-5" class="mainSlider__form">
                  <input type="text" placeholder="Quel cours voulez-vous apprendre aujourd'hui?">

                  <button class="button -md -purple-1 text-white">
                    <i class="icon icon-search mr-15"></i>
                    Rechercher
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div data-anim-child="slide-up delay-6" class="row y-gap-20 justify-center mainSlider__items">

            <div class="col-xl-3 col-md-4 col-sm-6">
              <div class="mainSlider-item text-center">
                <img src="{{ asset('assets/images/icons/1.svg') }}" alt="icon">
                <h4 class="text-20 fw-500 lh-18 text-white mt-8">100,000 online courses</h4>
                <p class="text-15 text-white">Explore a variety of fresh topics</p>
              </div>
            </div>

            <div class="col-xl-3 col-md-4 col-sm-6">
              <div class="mainSlider-item text-center">
                <img src="{{ asset('assets/images/icons/2.svg') }}" alt="icon">
                <h4 class="text-20 fw-500 lh-18 text-white mt-8">Expert instruction</h4>
                <p class="text-15 text-white">Find the right instructor for you</p>
              </div>
            </div>

            <div class="col-xl-3 col-md-4 col-sm-6">
              <div class="mainSlider-item text-center">
                <img src="{{ asset('assets/images/icons/3.svg') }}" alt="icon">
                <h4 class="text-20 fw-500 lh-18 text-white mt-8">Lifetime access</h4>
                <p class="text-15 text-white">Learn on your schedule</p>
              </div>
            </div>

          </div>
        </div>

        <button class="swiper-prev button -white-20 text-white size-60 rounded-full d-flex justify-center items-center js-prev">
          <i class="icon icon-arrow-left text-24"></i>
        </button>

        <button class="swiper-next button -white-20 text-white size-60 rounded-full d-flex justify-center items-center js-next">
          <i class="icon icon-arrow-right text-24"></i>
        </button>
      </section>

      @if($nos_partenaires->count() > 0)
      <section class="layout-pt-md layout-pb-md border-bottom-light">
        <div class="container">
          <div class="row justify-center">
            <div class="col text-center">
              <p class="text-lg text-dark-1">Nos partenaires de confiance</p>
            </div>
          </div>

           <div class="row y-gap-30 justify-between sm:justify-start items-center pt-60 md:pt-50">

            @foreach ($nos_partenaires as $partenaire)
            <div class="col-lg-auto col-md-2 col-sm-3 col-4">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="{{ asset('storage/' . $partenaire->logo) }}" alt="{{ $partenaire->nom }}">
              </div>
            </div>
            @endforeach

{{-- 
            <div class="col-lg-auto col-md-2 col-sm-3 col-4">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="{{ asset('assets/images/clients/2.svg') }}" alt="clients image">
              </div>
            </div>

            <div class="col-lg-auto col-md-2 col-sm-3 col-4">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="{{ asset('assets/images/clients/3.svg') }}" alt="clients image">
              </div>
            </div>

            <div class="col-lg-auto col-md-2 col-sm-3 col-4">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="{{ asset('assets/images/clients/4.svg') }}" alt="clients image">
              </div>
            </div>

            <div class="col-lg-auto col-md-2 col-sm-3 col-4">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="{{ asset('assets/images/clients/5.svg') }}" alt="clients image">
              </div>
            </div>

            <div class="col-lg-auto col-md-2 col-sm-3 col-4">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="{{ asset('assets/images/clients/6.svg') }}" alt="clients image">
              </div>
            </div> --}}

          </div> 
        </div>
      </section>
      @endif

      @if($categories_cours->count() > 0)
      <section class="layout-pt-lg layout-pb-lg">
        <div class="container">
          <div class="row justify-center text-center">
            <div class="col-auto">

              <div class="sectionTitle ">

                <h2 class="sectionTitle__title ">Categories</h2>

                {{-- <p class="sectionTitle__text ">Lorem ipsum dolor sit amet, consectetur.</p> --}}

              </div>

            </div>
          </div>

          <div class="row y-gap-30 pt-60 lg:pt-50">

            @foreach ($categories_cours as $categorie)
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="categoryCard -type-3">
                <div class="categoryCard__icon bg-light-3 mr-20">
                  <i class="icon {{$categorie->icon}} text-35"></i>
                </div>
                <div class="categoryCard__content">
                  <h4 class="categoryCard__title text-17 fw-500"> {{$categorie->nom}}</h4>
                  {{-- <div class="categoryCard__text text-13 lh-1 mt-5">573+ Courses</div> --}}
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif

      @if($cours_populaire->count() > 0)
      <section class="layout-pt-lg layout-pb-lg bg-light-3">
        <div data-anim-wrap class="container">
          <div class="row justify-center text-center">
            <div class="col-auto">

              <div class="sectionTitle ">

                <h2 class="sectionTitle__title ">Our Most Popular Courses</h2>

                <p class="sectionTitle__text ">10,000+ unique online course list designs</p>

              </div>

            </div>
          </div>

          <div class="relative pt-60 lg:pt-50 js-section-slider" data-gap="30" data-slider-cols="xl-3 lg-2">
            <div class="swiper-wrapper">

              @foreach ($cours_populaire as $item)
              <div class="swiper-slide">
                <div data-anim-child="slide-up delay-2">

                  <a href="{{ route('cours.details', $item->id) }}" class="coursesCard -type-1 shadow-3 rounded-8 bg-white">
                    <div class="relative">
                      <div class="coursesCard__image overflow-hidden rounded-top-8">
                        <img class="w-1/1" src="{{ asset('storage/' . $item->image) }}" alt="image">
                        <div class="coursesCard__image_overlay rounded-top-8"></div>
                      </div>
                      <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">

                        <div>
                          <div class="px-15 rounded-200 bg-purple-1">
                            {{-- <span class="text-11 lh-1 uppercase fw-500 text-white">{{ $item->niveau->nom }}</span> --}}
                          </div>
                        </div>

                        <div>
                          <div class="px-15 rounded-200 bg-green-1">
                            <span class="text-11 lh-1 uppercase fw-500 text-dark-1">{{ $item->categorie->nom }}</span>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="h-100 pt-20 pb-15 pl-30 pr-40">
                      <div class="d-flex items-center">
                        <div class="text-14 lh-1 text-yellow-1 mr-10">4.5</div>
                        <div class="d-flex x-gap-5 items-center">
                          <div class="icon-star text-9 text-yellow-1"></div>
                          <div class="icon-star text-9 text-yellow-1"></div>
                          <div class="icon-star text-9 text-yellow-1"></div>
                          <div class="icon-star text-9 text-yellow-1"></div>
                          <div class="icon-star text-9 text-yellow-1"></div>
                        </div>
                        {{-- <div class="text-13 lh-1 ml-10">(1991)</div> --}}
                      </div>

                      <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{ $item->titre }}</div>

                      <div class="d-flex x-gap-10 items-center pt-10">

                        <div class="d-flex items-center">
                          <div class="mr-8">
                            <img src="{{ asset('assets/img/coursesCards/icons/1.svg') }}" alt="icon">
                          </div>
                          <div class="text-14 lh-1">{{ $item->nombre_lesson }} lesson</div>
                        </div>

                        <div class="d-flex items-center">
                          <div class="mr-8">
                            <img src="{{ asset('assets/img/coursesCards/icons/2.svg') }}" alt="icon">
                          </div>
                          <div class="text-14 lh-1">{{ $item->duree }}</div>
                        </div>

                        <div class="d-flex items-center">
                          <div class="mr-8">
                            <img src="{{ asset('assets/img/coursesCards/icons/3.svg') }}" alt="icon">
                          </div>
                          <div class="text-14 lh-1">{{ $item->niveau->nom }}</div>
                        </div>

                      </div>

                      <div class="coursesCard-footer">
                        <div class="coursesCard-footer__author">
                          <img src="{{ $item->user->avatar ? asset('storage/users/avatar/' . $item->user->avatar) : asset('assets/img/general/avatar-1.png') }}" alt="image">
                          <div>{{ $item->user->first_name ?? 'Consultant' }} {{ $item->user->last_name ?? '' }}</div>
                        </div>

                        <div class="coursesCard-footer__price">
                          <div>{{ $item->prix }} {{ $item->devise->nom_court }}</div>
                          <div>{{ $item->prix_promo }} {{ $item->devise->nom_court }}</div>
                        </div>
                      </div>
                    </div>
                  </a>

                </div>
              </div>
              @endforeach   

            </div>
            <button class="section-slider-nav -prev -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-prev">
              <i class="icon icon-arrow-left text-24"></i>
            </button>

            <button class="section-slider-nav -next -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-next">
              <i class="icon icon-arrow-right text-24"></i>
            </button>

          </div>

          <div class="row justify-center pt-60 lg:pt-50">
            <div class="col-auto">

              <a href="{{ route('cours') }}" class="button -icon -purple-1 text-white">
                Parcourir tout les cours
                <i class="icon-arrow-top-right text-13 ml-10"></i>
              </a>

            </div>
          </div>
        </div>
      </section>
      @endif

      @if($nos_temoignages->count() > 0)
      <section class="layout-pt-lg layout-pb-lg bg-dark-5">
        <div class="container">
          <div class="row justify-center text-center">
            <div class="col-auto">

              <div class="sectionTitle ">

                <h2 class="sectionTitle__title text-white">Nos Apprenants par de nous!</h2>

                {{-- <p class="sectionTitle__text text-white">10,000+ unique online course list designs</p> --}}

              </div>

            </div>
          </div>

          <div class="pt-60 lg:pt-50 js-section-slider" data-gap="30" data-pagination data-slider-cols="xl-2" data-anim-wrap>
            <div class="swiper-wrapper">

              @foreach ($nos_temoignages as $temoignage)
              <div class="swiper-slide">
                <div data-anim-child="slide-left delay-1" class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                  <div class="row y-gap-30 md:text-center md:justify-center">
                    <div class="col-md-auto">
                      <div class="testimonials__image">
                        <img src="{{ asset('storage/' . $temoignage->image) }}" alt="image">
                      </div>
                    </div>

                    <div class="col-md">
                      {{-- <div class="d-flex items-center md:justify-center">
                        <span class="text-14 lh-1 text-yellow-1">4.5</span>
                        <div class="x-gap-5 px-10">
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                        </div>
                        <span class="text-13 lh-1">(1991)</span>
                      </div> --}}

                      <p class="testimonials__text text-16 lh-17 fw-500 mt-15">“{{$temoignage->description}}”</p>

                      <div class="mt-15">
                        <div class="text-15 lh-1 text-dark-1 fw-500">{{$temoignage->titre}}</div>
                        <div class="text-13 lh-1 mt-10">{{$temoignage->specialite}}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

              {{-- <div class="swiper-slide">
                <div data-anim-child="slide-left delay-2" class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                  <div class="row y-gap-30 md:text-center md:justify-center">
                    <div class="col-md-auto">
                      <div class="testimonials__image">
                        <img src="{{ asset('assets/images/testimonials/2.png') }}" alt="image">
                      </div>
                    </div>

                    <div class="col-md">
                      <div class="d-flex items-center md:justify-center">
                        <span class="text-14 lh-1 text-yellow-1">4.5</span>
                        <div class="x-gap-5 px-10">
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                        </div>
                        <span class="text-13 lh-1">(1991)</span>
                      </div>

                      <p class="testimonials__text text-16 lh-17 fw-500 mt-15">“I think Educrat is the best theme I ever seen this year. Amazing design, easy to customize and a design.”</p>

                      <div class="mt-15">
                        <div class="text-15 lh-1 text-dark-1 fw-500">Courtney Henry</div>
                        <div class="text-13 lh-1 mt-10">Web Designer</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div data-anim-child="slide-left delay-3" class="testimonials -type-3 sm:px-20 sm:py-40 bg-white">
                  <div class="row y-gap-30 md:text-center md:justify-center">
                    <div class="col-md-auto">
                      <div class="testimonials__image">
                        <img src="{{ asset('assets/images/testimonials/3.png') }}" alt="image">
                      </div>
                    </div>

                    <div class="col-md">
                      <div class="d-flex items-center md:justify-center">
                        <span class="text-14 lh-1 text-yellow-1">4.5</span>
                        <div class="x-gap-5 px-10">
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                          <i class="text-11 icon-star text-yellow-1"></i>
                        </div>
                        <span class="text-13 lh-1">(1991)</span>
                      </div>

                      <p class="testimonials__text text-16 lh-17 fw-500 mt-15">“I think Educrat is the best theme I ever seen this year. Amazing design, easy to customize and a design.”</p>

                      <div class="mt-15">
                        <div class="text-15 lh-1 text-dark-1 fw-500">Courtney Henry</div>
                        <div class="text-13 lh-1 mt-10">Web Designer</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}

            </div>

            <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40">
              <div class="col-auto">
                <button class="d-flex items-center text-24 arrow-left-hover js-prev">
                  <i class="icon text-white icon-arrow-left"></i>
                </button>
              </div>
              <div class="col-auto">
                <div class="pagination -arrows js-pagination"></div>
              </div>
              <div class="col-auto">
                <button class="d-flex items-center text-24 arrow-right-hover js-next">
                  <i class="icon text-white icon-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      @if($nos_events->count() > 0)
      <section class="layout-pt-lg layout-pb-lg border-top-light">
        <div data-anim-wrap class="container">
          <div class="row justify-center text-center">
            <div class="col-auto">

              <div class="sectionTitle ">

                <h2 class="sectionTitle__title ">Nos évènements à venir</h2>

                {{-- <p class="sectionTitle__text ">Lorem ipsum dolor sit amet, consectetur.</p> --}}

              </div>

            </div>
          </div>

          <div class="pt-60 lg:pt-50 js-section-slider" data-gap="30" data-pagination data-slider-cols="xl-3 lg-3 md-2">
            <div class="swiper-wrapper">

              @foreach ($nos_events as $event)
              <div class="swiper-slide">
                <div class="eventCard -type-3 bg-light-4 rounded-8">
                  <div class="eventCard__date">
                    <span class="text-45 lh-1 fw-700 text-dark-1">{{$event->date}}</span>
                    {{-- <span class="text-45 lh-1 fw-700 text-dark-1">15</span>
                    <span class="text-18 lh-1 fw-500 ml-15">JUNE</span> --}}
                  </div>

                  <h4 class="eventCard__title text-24 lh-15 fw-500">{{$event->titre}}</h4>

                  <div class="eventCard__button">
                    <p>{{$event->description}}</p>

                    {{-- <a href="#" class="button -icon -purple-1 text-white">
                      Buy Ticket
                      <i class="icon-arrow-top-right text-13 ml-10"></i>
                    </a> --}}

                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="d-flex justify-center x-gap-15 items-center pt-60 lg:pt-40">
              <div class="col-auto">
                <button class="d-flex items-center text-24 arrow-left-hover js-prev">
                  <i class="icon icon-arrow-left"></i>
                </button>
              </div>
              <div class="col-auto">
                <div class="pagination -arrows js-pagination"></div>
              </div>
              <div class="col-auto">
                <button class="d-flex items-center text-24 arrow-right-hover js-next">
                  <i class="icon icon-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      @include('v1.site.includes.footer')

    </div>
  </main>

  <script src="{{ asset('assets/js/vendors.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>