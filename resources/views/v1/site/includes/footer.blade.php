
<footer class="footer -type-1 -dark bg-light-9">
    <div class="container">
      <div class="footer-header border-bottom-dark">
        <div class="row y-gap-20 justify-between items-center">
          <div class="col-auto">
            <div class="footer-header__logo">

              {{-- <img src="{{ asset('assets/img/general/logo-dark.svg') }}" alt="logo"> --}}

              <a data-barba href="{{ route('home') }}">
                {{-- si c'est null --}}
                <img src="{{ asset($parametre->logo_footer) }}" alt="logo">

              </a>
            </div>
          </div>
          <div class="col-auto">
            <div class="footer-header-socials">
              <div class="footer-header-socials__title text-dark-1">Suivez-nous sur:</div>
              <div class="footer-header-socials__list">

                <a href="{{ $parametre->facebook_link ?? '#' }}" target="_blank"><i class="text-14 fa fa-facebook"></i></a>

                <a href="{{ $parametre->twitter_link ?? '#' }}"><i class="text-14 fa fa-twitter" target="_blank"></i></a>

                <a href="{{ $parametre->instagram_link ?? '#' }}"><i class="text-14 fa fa-instagram" target="_blank"></i></a>

                <a href="{{ $parametre->linkedin_link ?? '#' }}"><i class="text-14 fa fa-linkedin" target="_blank"></i></a>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-footer border-top-dark">
        <div class="row justify">
            <div class="footer-footer__copyright text-center" >© 2025 Cabinet KPC OURO. Tout droit reservé.</div>
        </div>
      </div>
    </div>
  </footer>