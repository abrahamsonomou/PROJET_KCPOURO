<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <!-- Stylesheets --> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- Ajoute SweetAlert2 depuis CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>@yield('title') | {{ $parametre->site_name ?? 'KPC OURO' }}</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
    <!-- preloader start -->
    <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
    </div>
    <!-- preloader end -->

    <!-- barba container start -->
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
                    let errorMessages = ` @foreach ($errors->all() as $error) {{ $error }}<br> @endforeach`;

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
                                    <a data-barba href="{{ route('home') }}">
                                        {{-- <img class="-light-d-none" src="{{ asset('assets/img/general/logo.svg') }}" alt="logo">
                    <img class="-dark-d-none" src="{{ asset('assets/img/general/logo-dark.svg') }}" alt="logo"> --}}
                                        <img src="{{ asset('storage/' . $parametre->logo ?? 'assets/img/general/logo.svg') }}"
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

                                    <div class="relative ">
                                        <button
                                            class="d-flex items-center text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light"
                                            data-el-toggle=".js-cart-toggle">
                                            <i class="text-20 icon icon-basket"></i>
                                        </button>

                                    </div>


                                    <div class="relative">
                                        <a href="#"
                                            class="d-flex items-center text-light-1 justify-center size-50 rounded-16 -hover-dshb-header-light"
                                            data-el-toggle=".js-msg-toggle">
                                            <i class="text-24 icon icon-email"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="relative d-flex items-center ml-10">
                                    @php
                                        $user = Auth::user();
                                    @endphp

                                    <a href="#" data-el-toggle=".js-profile-toggle">
                                        <img class="size-50 rounded-circle"
                                            src="{{ $user && $user->avatar ? asset('storage/users/avatar/' . $user->avatar) : asset('assets/images/avatar.png') }}"
                                            alt="avatar">
                                    </a>

                                    <div class="toggle-element js-profile-toggle">
                                        <div
                                            class="toggle-bottom -profile bg-white -dark-bg-dark-1 shadow-4 border-light rounded-8 mt-10">
                                            <div class="px-30 py-30">

                                                <div class="sidebar -dashboard">

                                                    <div class="sidebar__item ">
                                                        <a href="dshb-settings.html"
                                                            class="d-flex items-center text-17 lh-1 fw-500 ">
                                                            <i class="text-20 icon-setting mr-15"></i>
                                                            Settings
                                                        </a>
                                                    </div>

                                                    <div class="sidebar__item ">
                                                        <a href="#"
                                                            class="d-flex items-center text-17 lh-1 fw-500 ">
                                                            <i class="text-20 icon-power mr-15"></i>
                                                            Logout
                                                        </a>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
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
                                <a href="{{ route('instructors.dashboard') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-discovery mr-15"></i>
                                    Dashboard
                                </a>
                            </div>

                            <div class="sidebar__item @yield('isActive2')">
                                <a href="{{ route('instructors.my_cours') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                                    <i class="text-20 icon-play-button mr-15"></i>
                                    My Courses
                                </a>
                            </div>

                            {{-- <div class="sidebar__item @yield('isActive4')">
                                <a href="{{ route('instructors.create_cours') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-list mr-15"></i>
                                    Create Course
                                </a>
                            </div> --}}
{{-- 
                            <div class="sidebar__item @yield('isActive3')">
                                <a href="{{ route('instructors.my_articles') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-bookmark mr-15"></i>
                                    Mes Articles
                                </a>
                            </div> --}}

                            {{-- <div class="sidebar__item ">
                <a href="dshb-messages.html" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 icon-message mr-15"></i>
                  Messages
                </a>
              </div> --}}

                            {{-- <div class="sidebar__item @yield('isActive7')">
                                <a href="{{ route('instructors.create_articles') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-list mr-15"></i>
                                    Create Articles
                                </a>
                            </div> --}}

                            {{-- <div class="sidebar__item @yield('isActive5')">
                <a href="{{ route('instructors.reviews') }}" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 icon-comment mr-15"></i>
                  Reviews
                </a>
              </div> --}}

                            <div class="sidebar__item @yield('isActive6')">
                                <a href="{{ route('profile.show') }}"
                                    class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-setting mr-15"></i>
                                    Settings
                                </a>
                            </div>

                            <div class="sidebar__item ">
                                <a href="{{ route('logout') }}" class="d-flex items-center text-17 lh-1 fw-500 ">
                                    <i class="text-20 icon-power mr-15"></i>
                                    Logout
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
                                        © {{ $parametre->copyright_year ?? '2025' }}
                                        {{ $parametre->company_name ?? 'KCP OURO' }}. All Rights Reserved.</div>

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
    <!-- barba container end -->

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
