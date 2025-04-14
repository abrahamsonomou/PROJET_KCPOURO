@extends('v1.site.base')
@section('title', 'Blog by Tag')
@section('content')

<section data-anim="fade" class="breadcrumbs ">
    <div class="container">
      <div class="row">
        <div class="col-auto">
          <div class="breadcrumbs__content">

            <div class="breadcrumbs__item ">
              <a href="#">Home</a>
            </div>

            <div class="breadcrumbs__item ">
              <a href="#">All courses</a>
            </div>

            <div class="breadcrumbs__item ">
              <a href="#">User Experience Design</a>
            </div>

            <div class="breadcrumbs__item ">
              <a href="#">User Interface</a>
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
              <div class="text-14 text-purple-1 uppercase fw-500 mb-8">{{ $article->categorie->nom }}</div>


              <h1 class="page-header__title lh-14">{{ $article->titre }}</h1>


              <p class="page-header__text">{{ Str::limit($article->created_at, 10) }}</p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="layout-pt-md">
    <div class="container">
      <div class="ratio ratio-16:9 rounded-8 bg-image js-lazy" data-bg="{{ asset('storage/' . $article->image) }}"></div>
    </div>
  </section>

  <section class="layout-pt-md layout-pb-lg">
    <div class="container">
      <div class="blogSection">
        <div class="blogCard">
          <div class="row justify-center">
            <div class="col-xl-8 col-lg-9 col-md-11">
              <div class="blogCard__content pt-30">
                {{-- <p>
                    {{ $article->description }}
                </p> --}}
                  {!! $article->description !!}
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-center pt-30">
          <div class="col-xl-8 col-lg-9 col-md-11">
            <div class="row y-gap-20 justify-between items-center">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="lh-1 text-dark-1 fw-500 mr-30">Share</div>

                  <div class="d-flex x-gap-15">
                    <a href="#">Fb</a>
                    <a href="#">Tw</a>
                    <a href="#">In</a>
                    <a href="#">Ln</a>
                  </div>
                </div>
              </div>

              <div class="col-auto">
                <div class="row x-gap-10 y-gap-10">

                    @foreach($article->tags as $tag)
                  <div class="col-auto">
                    <a href="{{ route('tags.articles', $tag->id) }}" class="badge -sm -light-3 text-11 text-dark-1">{{ $tag->nom }}</a>
                  </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-center pt-30">
          <div class="col-xl-8 col-lg-9 col-md-11">
            <div class="d-flex border-bottom-light border-top-light py-30">
              <div class="">
                <div class="bg-image size-70 rounded-full js-lazy" data-bg=" {{ $article->user->avatar ? asset('storage/users/avatar/'. $article->user->avatar) : asset('assets/img/blog/blog-single/author.png') }}"></div>
              </div>

              <div class="ml-30 md:ml-20">
                <h4 class="text-17 lh-15 fw-500">{{ $article->user->first_name ?? '' }} {{ $article->user->last_name ?? '' }}</h4>
                <div class="mt-5">{{ $article->user->specialite->nom ?? '' }}</div>
                <p class="mt-25">{{ $article->user->bio ?? '' }}</p>
              </div>
            </div>
          </div>
        </div>


        {{-- <div class="row justify-center pt-30">
          <div class="col-xl-8 col-lg-9 col-md-11">
            <div class="blogPost -comments">
              <div class="blogPost__content">
                <h2 class="text-20 fw-500">
                  Reviews
                </h2>

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
                </ul>
              </div>
            </div>

            <div class="respondForm pt-30">
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
          </div>
        </div> --}}
      </div>
    </div>
  </section>

  {{-- <section class="layout-pt-lg layout-pb-lg bg-light-4">
    <div data-anim-wrap class="container">
      <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
        <div class="col-auto">

          <div class="sectionTitle ">

            <h2 class="sectionTitle__title ">Related Posts</h2>

            <p class="sectionTitle__text ">10,000+ unique online course list designs</p>

          </div>

        </div>
      </div>

      <div class="row y-gap-30 pt-60">

        <div class="col-lg-3 col-md-6">
          <div data-anim-child="slide-up delay-2" class="blogCard -type-1">
            <div class="blogCard__image">
              <img src="img/home-3/blog/1.png" alt="image">
            </div>
            <div class="blogCard__content mt-20">
              <a href="blog-single.html" class="blogCard__category">EDUCATION</a>
              <h4 class="blogCard__title text-17 lh-15 mt-5">Eco-Education in Our Lives: We Can Change the Future</h4>
              <div class="blogCard__date text-14 mt-5">December 16, 2022</div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div data-anim-child="slide-up delay-3" class="blogCard -type-1">
            <div class="blogCard__image">
              <img src="img/home-3/blog/2.png" alt="image">
            </div>
            <div class="blogCard__content mt-20">
              <a href="blog-single.html" class="blogCard__category">EDUCATION</a>
              <h4 class="blogCard__title text-17 lh-15 mt-5">Eco-Education in Our Lives: We Can Change the Future</h4>
              <div class="blogCard__date text-14 mt-5">December 16, 2022</div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div data-anim-child="slide-up delay-4" class="blogCard -type-1">
            <div class="blogCard__image">
              <img src="img/home-3/blog/3.png" alt="image">
            </div>
            <div class="blogCard__content mt-20">
              <a href="blog-single.html" class="blogCard__category">EDUCATION</a>
              <h4 class="blogCard__title text-17 lh-15 mt-5">Eco-Education in Our Lives: We Can Change the Future</h4>
              <div class="blogCard__date text-14 mt-5">December 16, 2022</div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div data-anim-child="slide-up delay-5" class="blogCard -type-1">
            <div class="blogCard__image">
              <img src="img/home-3/blog/4.png" alt="image">
            </div>
            <div class="blogCard__content mt-20">
              <a href="blog-single.html" class="blogCard__category">EDUCATION</a>
              <h4 class="blogCard__title text-17 lh-15 mt-5">Eco-Education in Our Lives: We Can Change the Future</h4>
              <div class="blogCard__date text-14 mt-5">December 16, 2022</div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section> --}}

@endsection
