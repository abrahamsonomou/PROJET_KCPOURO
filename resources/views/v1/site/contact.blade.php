@extends('v1.site.base')
@section('title', 'Contact')
@section('content')


<section class="page-header -type-4 bg-beige-1">
    <div class="container">
      <div class="page-header__content">
        <div class="row">
          <div class="col-auto">
            <div data-anim="slide-up delay-1">
              <h1 class="page-header__title">Contactez-nous !</h1>
            </div>

            <div data-anim="slide-up delay-2">
              {{-- <p class="page-header__text">We’re on a mission to deliver engaging, curated<br> courses at a reasonable price.</p> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="layout-pt-md layout-pb-lg">
    <div data-anim-wrap class="container">
      <div class="row y-gap-50 justify-between">
        
        <div class="col-xl-5 col-lg-6">
          <h3 class="text-24 lh-1 fw-500">Nos Bureaux</h3>
          <div class="row y-gap-30 pt-40">

            @foreach($bureaux as $bureau)

            <div class="col-sm-6">
              <div class="text-20 fw-500 text-dark-1">{{ $bureau->ville }}</div>
              <div class="y-gap-10 pt-15">
                <a href="#" class="d-block">{{ $bureau->adresse }}</a>
                <a href="#" class="d-block">{{ $bureau->telephone }}</a>
                <a href="#" class="d-block">{{ $bureau->email }}</a>
              </div>
            </div>
            @endforeach


          </div>
        </div>

        <div class="col-lg-6">
          <div class="px-40 py-40 bg-white border-light shadow-1 rounded-8 contact-form-to-top">
            <h3 class="text-24 fw-500">SVP Laissez-nous votre message.</h3>
            {{-- <p class="mt-25">Neque convallis a cras semper auctor. Libero id faucibus nisl<br> tincidunt egetnvallis.</p> --}}

            <form class="contact-form row y-gap-30 pt-60 lg:pt-40" action="{{ route('contacts.store') }}" method="POST">
              @csrf
              <div class="col-12">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{ $parametre->name_label ?? 'Nom complet' }}</label>
                <input type="text" name="nom" placeholder="{{ $parametre->name_placeholder ?? 'Nom...' }}">
              </div>
              <div class="col-12">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{ $parametre->email_label ?? 'Email Address' }}</label>
                <input type="email" name="email" placeholder="{{ $parametre->email_placeholder ?? 'Email...' }}">
              </div>
              <div class="col-12">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">{{ $parametre->message_label ?? 'Message...' }}</label>
                <textarea name="message" placeholder="{{ $parametre->message_placeholder ?? 'Message' }}" rows="8"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white">
                  {{ $parametre->submit_button_text ?? 'Envoyer le message' }}
                </button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- <section class="layout-pt-lg layout-pb-lg bg-light-4">
    <div class="container">
      <div class="row justify-center text-center">
        <div class="col-xl-8 col-lg-9 col-md-11">

          <div class="sectionTitle ">

            <h2 class="sectionTitle__title ">Frequently Asked Questions.</h2>

            <p class="sectionTitle__text ">Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>

          </div>


          <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">

            <div class="accordion__item">
              <div class="accordion__button">
                <div class="accordion__icon">
                  <div class="icon" data-feather="plus"></div>
                  <div class="icon" data-feather="minus"></div>
                </div>
                <span class="text-17 fw-500 text-dark-1">Do you offer discounts for students?</span>
              </div>

              <div class="accordion__content">
                <div class="accordion__content__inner">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
              </div>
            </div>

            <div class="accordion__item">
              <div class="accordion__button">
                <div class="accordion__icon">
                  <div class="icon" data-feather="plus"></div>
                  <div class="icon" data-feather="minus"></div>
                </div>
                <span class="text-17 fw-500 text-dark-1">Do you offer special pricing for big teams?</span>
              </div>

              <div class="accordion__content">
                <div class="accordion__content__inner">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
              </div>
            </div>

            <div class="accordion__item">
              <div class="accordion__button">
                <div class="accordion__icon">
                  <div class="icon" data-feather="plus"></div>
                  <div class="icon" data-feather="minus"></div>
                </div>
                <span class="text-17 fw-500 text-dark-1">What is the past experience of your teachers?</span>
              </div>

              <div class="accordion__content">
                <div class="accordion__content__inner">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
              </div>
            </div>

            <div class="accordion__item">
              <div class="accordion__button">
                <div class="accordion__icon">
                  <div class="icon" data-feather="plus"></div>
                  <div class="icon" data-feather="minus"></div>
                </div>
                <span class="text-17 fw-500 text-dark-1">What is the course refund policy?</span>
              </div>

              <div class="accordion__content">
                <div class="accordion__content__inner">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
              </div>
            </div>

            <div class="accordion__item">
              <div class="accordion__button">
                <div class="accordion__icon">
                  <div class="icon" data-feather="plus"></div>
                  <div class="icon" data-feather="minus"></div>
                </div>
                <span class="text-17 fw-500 text-dark-1">Do you offer discounts for non-profits?</span>
              </div>

              <div class="accordion__content">
                <div class="accordion__content__inner">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section> --}}

@endsection
