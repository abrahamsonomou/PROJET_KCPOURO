<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>@yield('title') | {{ $parametre->site_name ?? 'KPC OURO' }}O</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
    <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
    </div>
    <div class="barba-container" data-barba="container">
        <main class="main-content">
            <script>
                @if (session('swal_success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès',
                        text: '{{ session('swal_success') }}',
                    });
                @endif

                @if (session('swal_error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: '{{ session('swal_error') }}',
                    });
                @endif

                @if ($errors->any())
                    let errorMessages = `
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach`;

                    Swal.fire({
                        icon: 'error',
                        title: 'Erreurs de validation',
                        html: errorMessages,
                    });
                @endif
            </script>

            <header class="header -dashboard -dark-bg-dark-1 js-header">
                <div class="header__container py-20 px-30">
                    <div class="row justify-between items-center">
                        <div class="col-auto">
                            <div class="d-flex items-center">
                                <div class="header__explore text-dark-1">
                                    <button class="d-flex items-center js-dashboard-home-9-sidebar-toggle">
                                        <i class="icon -dark-text-white icon-explore"></i>
                                    </button>
                                </div>

                                <div class="header__logo ml-30 md:ml-20">
                                    <a data-barba href="{{ route('home') }}" target="__blank">
                                              <img src="{{ asset($parametre->logo) }}"
                                            alt="logo">

                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="d-flex items-center">

                                <div class="d-flex items-center sm:d-none">
                                    <div class="relative">
                                        <button
                                            class="js-darkmode-toggle text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                                            <i class="text-24 icon icon-night"></i>
                                        </button>
                                    </div>

                                    <div class="relative">
                                        <a href="#"
                                            class="d-flex items-center text-light-1 justify-center size-50 rounded-16 -hover-dshb-header-light"
                                            data-el-toggle=".js-notif-toggle">
                                            <i class="text-24 icon icon-notification"></i>
                                        </a>

                                        {{-- <div class="toggle-element js-notif-toggle">
                      <div class="toggle-bottom -notifications bg-white -dark-bg-dark-1 shadow-4 border-light rounded-8 mt-10">
                        <div class="py-30 px-30">
                          <div class="y-gap-40">

                            <div class="d-flex items-center ">
                              <div class="shrink-0">
                                <img src="assets/img/dashboard/actions/1.png" alt="image">
                              </div>
                              <div class="ml-12">
                                <h4 class="text-15 lh-1 fw-500">Your resume updated!</h4>
                                <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                              </div>
                            </div>

                            <div class="d-flex items-center border-top-light">
                              <div class="shrink-0">
                                <img src="assets/img/dashboard/actions/2.png" alt="image">
                              </div>
                              <div class="ml-12">
                                <h4 class="text-15 lh-1 fw-500">You changed password</h4>
                                <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                              </div>
                            </div>

                            <div class="d-flex items-center border-top-light">
                              <div class="shrink-0">
                                <img src="assets/img/dashboard/actions/3.png" alt="image">
                              </div>
                              <div class="ml-12">
                                <h4 class="text-15 lh-1 fw-500">Your account has been created successfully</h4>
                                <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                              </div>
                            </div>

                            <div class="d-flex items-center border-top-light">
                              <div class="shrink-0">
                                <img src="assets/img/dashboard/actions/4.png" alt="image">
                              </div>
                              <div class="ml-12">
                                <h4 class="text-15 lh-1 fw-500">You applied for a job Front-end Developer</h4>
                                <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                              </div>
                            </div>

                            <div class="d-flex items-center border-top-light">
                              <div class="shrink-0">
                                <img src="assets/img/dashboard/actions/5.png" alt="image">
                              </div>
                              <div class="ml-12">
                                <h4 class="text-15 lh-1 fw-500">Your course uploaded successfully</h4>
                                <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div> --}}
                                    </div>
                                </div>

                                <div class="relative d-flex items-center ml-10">
                                    @php
                                        $user = Auth::user();
                                    @endphp

                                    <a href="#" data-el-toggle=".js-profile-toggle">
                                        <img class="size-50 rounded-circle"
                                            src="{{ asset($user->avatar) }}"
                                            alt="avatar">
                                    </a>

                                    {{-- <div class="toggle-element js-profile-toggle">
                    <div class="toggle-bottom -profile bg-white -dark-bg-dark-1 shadow-4 border-light rounded-8 mt-10">
                      <div class="px-30 py-30">
                        <p>Lorem ipsum dolor sit amet.</p>
                        <p>Lorem, ipsum dolor.</p>
                      </div>
                    </div>
                  </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="content-wrapper js-content-wrapper">
                <div class="dashboard -home-9 js-dashboard-home-9">
                    <div class="dashboard__sidebar scroll-bar-1">


                        <div class="sidebar -dashboard">

                            <div class="sidebar__item @yield('isActive1')">
                                <a href="{{ route('students.dashboard') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-discovery mr-15"></i>
                                    Tableau de bord
                                </a>
                            </div>

                            <div class="sidebar__item @yield('isActive2')">
                                <a href="{{ route('students.my_cours') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                                    <i class="text-20 icon-play-button mr-15"></i>
                                    Mes Cours
                                </a>
                            </div>

                            <div class="sidebar__item @yield('isActive3')">
                                <a href="{{ route('students.panier') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-bookmark mr-15"></i>
                                    Mon Panier
                                </a>
                            </div>

                            {{-- <div class="sidebar__item @yield('isActive4')">
                <a href="" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 icon-comment mr-15"></i>
                  Mes revues
                </a>
              </div> --}}

                            {{-- <div class="sidebar__item ">
                <a href="dshb-messages.html" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 icon-message mr-15"></i>
                  Messages
                </a>
              </div> --}}

                            <div class="sidebar__item @yield('isActive5')">
                                <a href="{{ route('profile.show') }}" class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-list mr-15"></i>
                                    Parametres
                                </a>
                            </div>

                            <div class="sidebar__item ">
                                <a href="{{ route('logout') }}" class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-comment mr-15"></i>
                                    Deconnexion
                                </a>
                            </div>


                        </div>


                    </div>
                    <div class="dashboard__main">

                        @yield('content')

                        <footer class="footer -dashboard py-30">
                            <div class="row items-center justify-between">
                                <div class="col-auto">
                                    <div class="text-13 lh-1">
                                        {{ $parametre->copyright }}
                                        {{-- © {{ $parametre->copyright_year ?? '2025' }}
                                        {{ $parametre->company_name ?? 'KCP OURO' }}. All Rights Reserved. --}}
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        {{-- <div class="d-flex items-center flex-wrap x-gap-20">
                    <div>
                      <a href="help-center.html" class="text-13 lh-1">Help</a>
                    </div>
                    <div>
                      <a href="terms.html" class="text-13 lh-1">Privacy Policy</a>
                    </div>
                    <div>
                      <a href="#" class="text-13 lh-1">Cookie Notice</a>
                    </div>
                    <div>
                      <a href="#" class="text-13 lh-1">Security</a>
                    </div>
                    <div>
                      <a href="terms.html" class="text-13 lh-1">Terms of Use</a>
                    </div>
                  </div> --}}

                                        {{-- <button class="button -md -rounded bg-light-4 text-light-1 ml-30">English</button> --}}
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>

                </div>
            </div>
        </main>

    </div>
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
