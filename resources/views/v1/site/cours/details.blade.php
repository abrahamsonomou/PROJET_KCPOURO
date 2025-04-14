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

            <div class="breadcrumbs__item ">
              <a href="">{{ $cours->titre }}</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="js-pin-container">
    <section class="page-header -type-5 bg-light-6">
      <div class="page-header__bg">
        <div class="bg-image js-lazy" data-bg="{{ asset('assets/img/event-single/bg.png') }}"></div>
      </div>

      <div class="container">
        <div class="page-header__content pt-90 pb-90">
            <div class="row y-gap-30 relative">
                <div class="col-xl-7 col-lg-8">

                    <div class="d-flex x-gap-15 y-gap-10 pb-20">
                        <div>
                            <div class="badge px-15 py-8 text-11 bg-purple-1 text-white fw-400">{{ $cours->categorie->nom }}</div>
                        </div>
                    </div>
    
                    <div data-anim="slide-up delay-1">
                        <h1 class="text-30 lh-14 pr-60 lg:pr-0">{{ $cours->titre }}</h1>
                    </div>
    
                    <p class="col-xl-9 mt-20">{{ $cours->short_description }}</p>
    
                    <div class="d-flex x-gap-30 y-gap-10 items-center flex-wrap pt-20">
                        {{-- <div class="d-flex items-center">
                            <div class="text-14 lh-1 text-yellow-1 mr-10">4.5</div>
                            <div class="d-flex x-gap-5 items-center">
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                            </div>
                            <div class="text-14 lh-1 text-light-1 ml-10">(1991)</div>
                        </div> --}}
    
                        <div class="d-flex items-center text-light-1">
                            <div class="icon icon-person-3 text-13"></div>
                            <div class="text-14 ml-8">{{ $cours->etudiants->count() }} étudiants inscrits</div>
                        </div>
    
                        <div class="d-flex items-center text-light-1">
                            <div class="icon icon-wall-clock text-13"></div>
                            <div class="text-14 ml-8">Dernière mise à jour {{ $cours->updated_at->format('d/m/Y') }}</div>
                        </div>
                    </div>
    
                    <div class="d-flex items-center pt-20">
                        <div class="bg-image size-30 rounded-full js-lazy" data-bg="{{ $cours->user->avatar ? asset('storage/users/avatar/' . $cours->user->avatar) : asset('assets/img/general/avatar-1.png') }}"></div>
                        <div class="text-14 lh-1 ml-10">{{ $cours->user->first_name ?? 'Consultant' }} {{ $cours->user->last_name ?? '' }}</div><br>
                        <div class="text-14 lh-1 ml-10"> - {{ $cours->user->specialite->nom ?? '' }}</div>
                    </div>
                </div>
    
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="courses-single-info js-pin-content">
                    <div class="bg-white shadow-2 rounded-8 border-light py-10 px-10">
                        <div class="relative">
                            <img class="w-1/1" src="{{ asset('storage/' . $cours->image) }}" alt="image">
                            <div class="absolute-full-center d-flex justify-center items-center">
                                <a href="{{ $cours->video_url }}" class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery" data-gallery="gallery1">
                                    <div class="icon-play text-18"></div>
                                </a>
                            </div>
                        </div>
    
                        <div class="courses-single-info__content scroll-bar-1 pt-30 pb-20 px-20">
                            <div class="d-flex justify-between items-center mb-30">
                                <div class="text-24 lh-1 text-dark-1 fw-500">${{ $cours->prix }}</div>
                                @if($cours->prix_promo)
                                    <div class="lh-1 line-through">${{ $cours->prix_promo }}</div>
                                @endif
                            </div>

                            <form action="{{ route('inscrire', $cours->id) }}" method="POST">
                              @csrf
                              <button type="submit" class="button -md -purple-1 text-white w-1/1">S'inscrire</button>
                           </form>
    
                            {{-- <button class="button -md -purple-1 text-white w-1/1">Ajouter au panier</button> --}}
                            {{-- <a href="" class="button -md -purple-1 text-white w-1/1">Ajouter au panier</a> --}}
                            {{-- <button class="button -md -outline-dark-1 text-dark-1 w-1/1 mt-10">Acheter maintenant</button> --}}
    
                            {{-- <div class="text-14 lh-1 text-center mt-30">Garantie de remboursement de 30 jours</div> --}}
    
                            <div class="mt-25">
                                <div class="d-flex justify-between py-8">
                                    <div class="d-flex items-center text-dark-1">
                                        <div class="icon-video-file"></div>
                                        <div class="ml-10">Leçons</div>
                                    </div>
                                    <div>{{ $cours->nombre_lesson }}</div>
                                </div>
    
                                <div class="d-flex justify-between py-8 border-top-light">
                                    <div class="d-flex items-center text-dark-1">
                                        <div class="icon-clock-2"></div>
                                        <div class="ml-10">Durée</div>
                                    </div>
                                    <div>{{ $cours->duree }}</div>
                                </div>
    
                                    
                                <div class="d-flex justify-between py-8 border-top-light">
                                  <div class="d-flex items-center text-dark-1">
                                      <div class="icon-bar-chart-2"></div>
                                      <div class="ml-10">Categorie</div>
                                  </div>
                                  <div>{{ $cours->categorie->nom }}</div>
                              </div>

                                <div class="d-flex justify-between py-8 border-top-light">
                                    <div class="d-flex items-center text-dark-1">
                                        <div class="icon-bar-chart-2"></div>
                                        <div class="ml-10">Niveau</div>
                                    </div>
                                    <div>{{ $cours->niveau->nom }}</div>
                                </div>
    
                                <div class="d-flex justify-between py-8 border-top-light">
                                    <div class="d-flex items-center text-dark-1">
                                        <div class="icon-translate"></div>
                                        <div class="ml-10">Langue</div>
                                    </div>
                                    <div>{{ $cours->langue->nom }}</div>
                                </div>
    
                                <div class="d-flex justify-between py-8 border-top-light">
                                    <div class="d-flex items-center text-dark-1">
                                        <div class="icon-badge"></div>
                                        <div class="ml-10">Certificat</div>
                                    </div>
                                    <div>
                                      Oui
                                    </div>
                                </div>
    
                                {{-- <div class="d-flex justify-between py-8 border-top-light">
                                    <div class="d-flex items-center text-dark-1">
                                        <div class="icon-infinity"></div>
                                        <div class="ml-10">Accès à vie</div>
                                    </div>
                                    <div>Oui</div>
                                </div> --}}
                            </div>
    
                            {{-- <div class="d-flex justify-center pt-15">
                                <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                                    <i class="fa fa-facebook"></i>
                                </a>
    
                                <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                                    <i class="fa fa-twitter"></i>
                                </a>
    
                                <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                                    <i class="fa fa-instagram"></i>
                                </a>
    
                                <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    
      {{-- <div class="container">
        <div class="page-header__content pt-90 pb-90">
          <div class="row y-gap-30 relative">
            <div class="col-xl-7 col-lg-8">
              <div class="d-flex x-gap-15 y-gap-10 pb-20">
                <div>
                  <div class="badge px-15 py-8 text-11 bg-green-1 text-dark-1 fw-400">BEST SELLER</div>
                </div>
                <div>
                  <div class="badge px-15 py-8 text-11 bg-orange-1 text-white fw-400">NEW</div>
                </div>
                <div>
                  <div class="badge px-15 py-8 text-11 bg-purple-1 text-white fw-400">POPULAR</div>
                </div>
              </div>

              <div data-anim="slide-up delay-1">
                <h1 class="text-30 lh-14 pr-60 lg:pr-0">User Experience Design Essentials - Adobe XD UI UX Design</h1>
              </div>

              <p class="col-xl-9 mt-20">Use XD to get a job in UI Design, User Interface, User Experience design, UX design & Web Design</p>

              <div class="d-flex x-gap-30 y-gap-10 items-center flex-wrap pt-20">
                <div class="d-flex items-center">
                  <div class="text-14 lh-1 text-yellow-1 mr-10">4.5</div>
                  <div class="d-flex x-gap-5 items-center">
                    <div class="icon-star text-11 text-yellow-1"></div>
                    <div class="icon-star text-11 text-yellow-1"></div>
                    <div class="icon-star text-11 text-yellow-1"></div>
                    <div class="icon-star text-11 text-yellow-1"></div>
                    <div class="icon-star text-11 text-yellow-1"></div>
                  </div>
                  <div class="text-14 lh-1 text-light-1 ml-10">(1991)</div>
                </div>


                <div class="d-flex items-center text-light-1">
                  <div class="icon icon-person-3 text-13"></div>
                  <div class="text-14 ml-8">853 enrolled on this course</div>
                </div>

                <div class="d-flex items-center text-light-1">
                  <div class="icon icon-wall-clock text-13"></div>
                  <div class="text-14 ml-8">Last updated 11/2021</div>
                </div>

              </div>

              <div class="d-flex items-center pt-20">
                <div class="bg-image size-30 rounded-full js-lazy" data-bg="img/avatars/small-1.png"></div>
                <div class="text-14 lh-1 ml-10">Ali Tufan</div>
              </div>
            </div>

            <div class="courses-single-info js-pin-content">
              <div class="bg-white shadow-2 rounded-8 border-light py-10 px-10">
                <div class="relative">
                  <img class="w-1/1" src="img/misc/1.png" alt="image">
                  <div class="absolute-full-center d-flex justify-center items-center">
                    <a href="https://www.youtube.com/watch?v=ANYfx4-jyqY" class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery" data-gallery="gallery1">
                      <div class="icon-play text-18"></div>
                    </a>
                  </div>
                </div>

                <div class="courses-single-info__content scroll-bar-1 pt-30 pb-20 px-20">
                  <div class="d-flex justify-between items-center mb-30">
                    <div class="text-24 lh-1 text-dark-1 fw-500">$96.00</div>
                    <div class="lh-1 line-through">$76.00</div>
                  </div>

                  <button class="button -md -purple-1 text-white w-1/1">Add To Cart</button>
                  <button class="button -md -outline-dark-1 text-dark-1 w-1/1 mt-10">Buy Now</button>

                  <div class="text-14 lh-1 text-center mt-30">30-Day Money-Back Guarantee</div>

                  <div class="mt-25">

                    <div class="d-flex justify-between py-8 ">
                      <div class="d-flex items-center text-dark-1">
                        <div class="icon-video-file"></div>
                        <div class="ml-10">Lessons</div>
                      </div>
                      <div>20</div>
                    </div>

                    <div class="d-flex justify-between py-8 border-top-light">
                      <div class="d-flex items-center text-dark-1">
                        <div class="icon-puzzle"></div>
                        <div class="ml-10">Quizzes</div>
                      </div>
                      <div>3</div>
                    </div>

                    <div class="d-flex justify-between py-8 border-top-light">
                      <div class="d-flex items-center text-dark-1">
                        <div class="icon-clock-2"></div>
                        <div class="ml-10">Duration</div>
                      </div>
                      <div>13 Hours</div>
                    </div>

                    <div class="d-flex justify-between py-8 border-top-light">
                      <div class="d-flex items-center text-dark-1">
                        <div class="icon-bar-chart-2"></div>
                        <div class="ml-10">Skill level</div>
                      </div>
                      <div>Beginner</div>
                    </div>

                    <div class="d-flex justify-between py-8 border-top-light">
                      <div class="d-flex items-center text-dark-1">
                        <div class="icon-translate"></div>
                        <div class="ml-10">Language</div>
                      </div>
                      <div>English</div>
                    </div>

                    <div class="d-flex justify-between py-8 border-top-light">
                      <div class="d-flex items-center text-dark-1">
                        <div class="icon-badge"></div>
                        <div class="ml-10">Certificate</div>
                      </div>
                      <div>Yes</div>
                    </div>

                    <div class="d-flex justify-between py-8 border-top-light">
                      <div class="d-flex items-center text-dark-1">
                        <div class="icon-infinity"></div>
                        <div class="ml-10">Full lifetime access</div>
                      </div>
                      <div>Yes</div>
                    </div>

                  </div>

                  <div class="d-flex justify-center pt-15">

                    <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                      <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                      <i class="fa fa-twitter"></i>
                    </a>

                    <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                      <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                      <i class="fa fa-linkedin"></i>
                    </a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </section>


    <section class="layout-pt-md layout-pb-md">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="page-nav-menu -line">
              <div class="d-flex x-gap-30">
                <div><a href="#overview" class="pb-12 page-nav-menu__link is-active">Overview</a></div>
                <div><a href="#course-content" class="pb-12 page-nav-menu__link">Course Content</a></div>
                <div><a href="#instructors" class="pb-12 page-nav-menu__link">Instructors</a></div>
                <div><a href="#reviews" class="pb-12 page-nav-menu__link">Reviews</a></div>
              </div>
            </div>

            <div id="overview" class="pt-60 lg:pt-40 to-over">
              <h4 class="text-18 fw-500">Description</h4>

              <div class="show-more mt-30 js-show-more">
                <div class="show-more__content">
                  <p class="">{{ $cours->description}}</p>
                </div>

                <button class="show-more__button text-purple-1 fw-500 underline mt-30">Voir plus</button>
              </div>

              <div class="mt-60">
                <h4 class="text-20 mb-30">Dans ce cours, vous apprendrez :</h4>
                <div class="row x-gap-100 justfiy-between">

                  @foreach($cours->objectifs as $objectif)
                  <div class="col-md-6">
                    <div class="y-gap-20">


                      <div class="d-flex items-center">
                        <div class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                          <i class="size-12" data-feather="check"></i>
                        </div>
                        <p>{{ $objectif }}.</p>
                      </div>

                    </div>
                  </div>
              @endforeach

                </div>
              </div>

              {{-- a traiter --}}
              {{-- <div class="mt-60">
                <h4 class="text-20">Requirements</h4>
                <ul class="ul-list y-gap-15 pt-30">

                  @foreach($cours->prerequis as $item)
                  <li>{{ $item->nom }}</li>
                  @endforeach


                </ul>
              </div> --}}
            </div>

            {{-- <div id="course-content" class="pt-60 lg:pt-40">
              <h2 class="text-20 fw-500">Course Content</h2>

              <div class="d-flex justify-between items-center mt-30">
                <div class="">27 sections • 95 lectures</div>
                <a href="#" class="underline text-purple-1">Expand All Sections</a>
              </div>

              <div class="mt-10">
                <div class="accordion -block-2 text-left js-accordion">

                  <div class="accordion__item">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="accordion__icon">
                          <div class="icon" data-feather="chevron-down"></div>
                          <div class="icon" data-feather="chevron-up"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1">Course Content</span>
                      </div>

                      <div>5 lectures • 87 min</div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="y-gap-20">

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Introduction to the User Experience Course</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Getting started with your Adobe XD project</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>What is UI vs UX - User Interface vs User Experience vs Product Designer</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Wireframing (low fidelity) in Adobe XD</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Viewing your prototype on a mobile device</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Sharing your design</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion__item">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="accordion__icon">
                          <div class="icon" data-feather="chevron-down"></div>
                          <div class="icon" data-feather="chevron-up"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1">The Brief</span>
                      </div>

                      <div>5 lectures • 87 min</div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="y-gap-20">

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Introduction to the User Experience Course</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Getting started with your Adobe XD project</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>What is UI vs UX - User Interface vs User Experience vs Product Designer</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Wireframing (low fidelity) in Adobe XD</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Viewing your prototype on a mobile device</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Sharing your design</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion__item">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="accordion__icon">
                          <div class="icon" data-feather="chevron-down"></div>
                          <div class="icon" data-feather="chevron-up"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1">Type, Color &amp; Icon Introduction</span>
                      </div>

                      <div>5 lectures • 87 min</div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="y-gap-20">

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Introduction to the User Experience Course</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Getting started with your Adobe XD project</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>What is UI vs UX - User Interface vs User Experience vs Product Designer</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Wireframing (low fidelity) in Adobe XD</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Viewing your prototype on a mobile device</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Sharing your design</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion__item">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="accordion__icon">
                          <div class="icon" data-feather="chevron-down"></div>
                          <div class="icon" data-feather="chevron-up"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1">Prototyping a App - Introduction</span>
                      </div>

                      <div>5 lectures • 87 min</div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="y-gap-20">

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Introduction to the User Experience Course</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Getting started with your Adobe XD project</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>What is UI vs UX - User Interface vs User Experience vs Product Designer</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Wireframing (low fidelity) in Adobe XD</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Viewing your prototype on a mobile device</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Sharing your design</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion__item">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="accordion__icon">
                          <div class="icon" data-feather="chevron-down"></div>
                          <div class="icon" data-feather="chevron-up"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1">Wireframe Feedback</span>
                      </div>

                      <div>5 lectures • 87 min</div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="y-gap-20">

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Introduction to the User Experience Course</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Getting started with your Adobe XD project</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>What is UI vs UX - User Interface vs User Experience vs Product Designer</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Wireframing (low fidelity) in Adobe XD</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Viewing your prototype on a mobile device</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                          <div class="d-flex justify-between">
                            <div class="d-flex items-center">
                              <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                <div class="icon-play text-9"></div>
                              </div>
                              <div>Sharing your design</div>
                            </div>

                            <div class="d-flex x-gap-20 items-center">
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">Preview</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">5 question</a>
                              <a href="#" class="text-14 lh-1 text-purple-1 underline">03:56</a>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div> --}}

            <div id="instructors" class="pt-60 lg:pt-40">
              <h2 class="text-20 fw-500">Consultant</h2>

              <div class="mt-30">
                <div class="d-flex x-gap-20 y-gap-20 items-center flex-wrap">
                  <div class="size-120">
                    <img class="object-cover" src="{{ $cours->user->avatar ? asset('storage/users/avatar/' . $cours->user->avatar) : asset('assets/img/general/avatar-1.png') }}" alt="image">
                  </div>

                  <div class="">
                    <h5 class="text-17 lh-14 fw-500">{{ $cours->user->first_name ?? 'Consultant' }} {{ $cours->user->last_name ?? '' }}</h5>
                    <p class="mt-5">{{ $cours->user->specialite->nom ?? '' }}</p>

                    {{-- <div class="d-flex x-gap-20 y-gap-10 flex-wrap items-center pt-10">
                      <div class="d-flex items-center">
                        <div class="d-flex items-center mr-8">
                          <div class="icon-star text-11 text-yellow-1"></div>
                          <div class="text-14 lh-12 text-yellow-1 ml-5">4.5</div>
                        </div>
                        <div class="text-13 lh-1">Instructor Rating</div>
                      </div>

                      <div class="d-flex items-center text-light-1">
                        <div class="icon-comment text-13 mr-8"></div>
                        <div class="text-13 lh-1">23,987 Reviews</div>
                      </div>

                      <div class="d-flex items-center text-light-1">
                        <div class="icon-person-3 text-13 mr-8"></div>
                        <div class="text-13 lh-1">692 Students</div>
                      </div>

                      <div class="d-flex items-center text-light-1">
                        <div class="icon-wall-clock text-13 mr-8"></div>
                        <div class="text-13 lh-1">15 Course</div>
                      </div>

                    </div> --}}
                  </div>
                </div>

                {{-- <div class="mt-30">
                  <p>
                    Back in 2010, I started brainspin with a desire to design compelling and engaging apps. For over 7 years, I have designed many high profile web and iPhone applications. The applications range from 3D medical aided web applications to project management applications for niche industries.
                    <br><br>
                    I am also the founder of a large local design organization, Salt Lake Designers, where I and other local influencers help cultivate the talents of up and coming UX designers through workshops and panel discussions.
                  </p>
                </div> --}}
              </div>
            </div>

            {{-- <div id="reviews" class="pt-60 lg:pt-40">
              <div class="blogPost -comments">
                <div class="blogPost__content">
                  <h2 class="text-20 fw-500">Student feedback</h2>
                  <div class="row x-gap-10 y-gap-10 pt-30">
                    <div class="col-md-4">
                      <div class="d-flex items-center justify-center flex-column py-50 text-center bg-light-6 rounded-8">
                        <div class="text-60 lh-11 text-dark-1 fw-500">4.8</div>
                        <div class="d-flex x-gap-5 mt-10">
                          <div class="icon-star text-11 text-yellow-1"></div>
                          <div class="icon-star text-11 text-yellow-1"></div>
                          <div class="icon-star text-11 text-yellow-1"></div>
                          <div class="icon-star text-11 text-yellow-1"></div>
                          <div class="icon-star text-11 text-yellow-1"></div>
                        </div>
                        <div class="mt-10">Course Rating</div>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="py-20 px-30 bg-light-6 rounded-8">
                        <div class="row y-gap-15">

                          <div class="col-12">
                            <div class="d-flex items-center">
                              <div class="progress-bar w-1/1 mr-15">
                                <div class="progress-bar__bg bg-light-12"></div>
                                <div class="progress-bar__bar bg-purple-1 w-1/1"></div>
                              </div>
                              <div class="d-flex x-gap-5 pr-15">
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                              </div>
                              <div class="text-dark-1">70%</div>
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="d-flex items-center">
                              <div class="progress-bar w-1/1 mr-15">
                                <div class="progress-bar__bg bg-light-12"></div>
                                <div class="progress-bar__bar bg-purple-1 w-1/2"></div>
                              </div>
                              <div class="d-flex x-gap-5 pr-15">
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                              </div>
                              <div class="text-dark-1">15%</div>
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="d-flex items-center">
                              <div class="progress-bar w-1/1 mr-15">
                                <div class="progress-bar__bg bg-light-12"></div>
                                <div class="progress-bar__bar bg-purple-1 w-1/3"></div>
                              </div>
                              <div class="d-flex x-gap-5 pr-15">
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                              </div>
                              <div class="text-dark-1">20%</div>
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="d-flex items-center">
                              <div class="progress-bar w-1/1 mr-15">
                                <div class="progress-bar__bg bg-light-12"></div>
                                <div class="progress-bar__bar bg-purple-1 w-1/5"></div>
                              </div>
                              <div class="d-flex x-gap-5 pr-15">
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                              </div>
                              <div class="text-dark-1">3%</div>
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="d-flex items-center">
                              <div class="progress-bar w-1/1 mr-15">
                                <div class="progress-bar__bg bg-light-12"></div>
                                <div class="progress-bar__bar bg-purple-1 w-1/7"></div>
                              </div>
                              <div class="d-flex x-gap-5 pr-15">
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                                <div class="icon-star text-11 text-yellow-1"></div>
                              </div>
                              <div class="text-dark-1">2%</div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <h2 class="text-20 fw-500 mt-60 lg:mt-40">Reviews</h2>
                  <ul class="comments__list mt-30">
                    <li class="comments__item">
                      <div class="comments__item-inner md:direction-column">
                        <div class="comments__img mr-20">
                          <div class="bg-image rounded-full js-lazy" data-bg="img/avatars/1.png"></div>
                        </div>

                        <div class="comments__body md:mt-15">
                          <div class="comments__header">
                            <h4 class="text-17 fw-500 lh-15">
                              Ali Tufan
                              <span class="text-13 text-light-1 fw-400">3 Days ago</span>
                            </h4>

                            <div class="stars"></div>
                          </div>

                          <h5 class="text-15 fw-500 mt-15">The best LMS Design</h5>
                          <div class="comments__text mt-10">
                            <p>This course is a very applicable. Professor Ng explains precisely each algorithm and even tries to give an intuition for mathematical and statistic concepts behind each algorithm. Thank you very much.</p>
                          </div>

                          <div class="comments__helpful mt-20">
                            <span class="text-13 text-purple-1">Was this review helpful?</span>
                            <button class="button text-13 -sm -purple-1 text-white">Yes</button>
                            <button class="button text-13 -sm -light-7 text-purple-1">No</button>
                          </div>
                        </div>
                      </div>
                    </li>

                    <li class="comments__item">
                      <div class="comments__item-inner md:direction-column">
                        <div class="comments__img mr-20">
                          <div class="bg-image rounded-full js-lazy" data-bg="img/avatars/1.png"></div>
                        </div>

                        <div class="comments__body md:mt-15">
                          <div class="comments__header">
                            <h4 class="text-17 fw-500 lh-15">
                              Ali Tufan
                              <span class="text-13 text-light-1 fw-400">3 Days ago</span>
                            </h4>

                            <div class="stars"></div>
                          </div>

                          <h5 class="text-15 fw-500 mt-15">The best LMS Design</h5>
                          <div class="comments__text mt-10">
                            <p>This course is a very applicable. Professor Ng explains precisely each algorithm and even tries to give an intuition for mathematical and statistic concepts behind each algorithm. Thank you very much.</p>
                          </div>

                          <div class="comments__helpful mt-20">
                            <span class="text-13 text-purple-1">Was this review helpful?</span>
                            <button class="button text-13 -sm -purple-1 text-white">Yes</button>
                            <button class="button text-13 -sm -light-7 text-purple-1">No</button>
                          </div>
                        </div>
                      </div>
                    </li>

                    <li class="comments__item">
                      <div class="d-flex justify-center">
                        <button class="text-purple-1 lh-12 underline fw-500">View All Reviews</button>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="respondForm pt-60">
                <h3 class="text-20 fw-500">
                  Write a Review
                </h3>

                <div class="mt-30">
                  <h4 class="text-16 fw-500">What is it like to Course?</h4>
                  <div class="d-flex x-gap-10 pt-10">
                    <div class="icon-star text-14 text-yellow-1"></div>
                    <div class="icon-star text-14 text-yellow-1"></div>
                    <div class="icon-star text-14 text-yellow-1"></div>
                    <div class="icon-star text-14 text-yellow-1"></div>
                    <div class="icon-star text-14 text-yellow-1"></div>
                  </div>
                </div>

                <form class="contact-form respondForm__form row y-gap-30 pt-30" action="#">
                  <div class="col-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Review Title</label>
                    <input type="text" name="title" placeholder="Great Courses">
                  </div>
                  <div class="col-12">
                    <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Review Content</label>
                    <textarea name="comment" placeholder="Message" rows="8"></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white">
                      Submit Review
                    </button>
                  </div>
                </form>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </section>

  </div>


  <section class="layout-pt-md layout-pb-lg">
    <div data-anim-wrap class="container">
      <div class="row">
        <div class="col-auto">

          <div class="sectionTitle ">

            <h2 class="sectionTitle__title ">Cours en relation</h2>

            {{-- <p class="sectionTitle__text ">10,000+ unique online course list designs</p> --}}

          </div>

        </div>
      </div>

      <div class="relative pt-60 lg:pt-50">
        <div class="overflow-hidden js-section-slider" data-gap="30" data-loop data-pagination data-nav-prev="js-courses-prev" data-nav-next="js-courses-next" data-slider-cols="xl-4 lg-3 md-2">
          <div class="swiper-wrapper">

            @foreach ($cours_en_relation as $item)
            <div data-anim-child="slide-up delay-1" class="swiper-slide">
            
              <a href="{{ route('cours.details', $item->id) }}" class="coursesCard -type-1">
                <div class="relative">
                  <div class="coursesCard__image overflow-hidden rounded-8">
                    <img class="w-1/1" src="{{ asset('storage/' . $item->image) }}" alt="image">
                    <div class="coursesCard__image_overlay rounded-8"></div>
                  </div>
                </div>
            
                <div class="h-100 pt-15">
                  <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{ $item->titre }}</div>
            
                  <div class="d-flex x-gap-10 items-center pt-10">
                    <div class="d-flex items-center">
                      <div class="mr-8">
                        <img src="{{ asset('assets/img/coursesCards/icons/1.svg') }}" alt="icon">
                      </div>
                      <div class="text-14 lh-1">{{ $item->nombre_lesson }} leçons</div>
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
        </div>


        <button class="section-slider-nav -prev -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-courses-prev">
          <i class="icon icon-arrow-left text-24"></i>
        </button>

        <button class="section-slider-nav -next -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-courses-next">
          <i class="icon icon-arrow-right text-24"></i>
        </button>

      </div>
    </div>
  </section>

@endsection

