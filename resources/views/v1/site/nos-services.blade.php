@extends('v1.site.base') 
@section('title', 'Nos Services')

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
                <a href="{{ route('services') }}">Nos Services</a>
              </div>
  
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-bg layout-pt-lg layout-pb-md">
    <div class="section-bg__item -full -height-half bg-dark-5"></div>

    <div data-anim-wrap class="container">
      <div class="row justify-center text-center">
        <div class="col-auto">

          <div class="sectionTitle ">

            <h2 class="sectionTitle__title text-white">Nos Services </h2>

            {{-- <p class="sectionTitle__text text-white">Lorem ipsum dolor sit amet, consectetur.</p> --}}

          </div>

        </div>
      </div>
    
      @if($nos_services->count() > 0)

      <div data-anim-wrap class="row y-gap-30 justify-between pt-60 lg:pt-50">

        @foreach ($nos_services as $service)
            <div data-anim-child="slide-up delay-1" class="col-lg-3 col-md-6">
            <div class="coursesCard -type-2 text-center pt-50 pb-40 px-30 rounded-8 bg-white shadow-2">
                <div class="coursesCard__image">
                <img src="{{ asset('storage/' . $service->image) }}" alt="image">
                </div>
                <div class="coursesCard__content mt-30">
                <h5 class="coursesCard__title text-18 lh-1 fw-500">{{ $service->titre }}</h5>
                <p class="coursesCard__text text-14 mt-10">{{ $service->description }}</p>
                </div>
            </div>
            </div>
        @endforeach

      </div>
      @endif

    </div>
  </section>

@endsection
