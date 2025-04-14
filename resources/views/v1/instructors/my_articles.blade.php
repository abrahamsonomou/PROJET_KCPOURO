@extends('v1.instructors.base')
@section('title', 'My articles')
@section('isActive3')
    -is-active -dark-bg-dark-2
@endsection
@section('content')

    <div class="dashboard__content bg-light-4">
        <div class="row pb-50 mb-10">
            <div class="col-auto">
                <h1 class="text-30 lh-12 fw-700">My Articles</h1>
            </div>
        </div>


        <div class="row y-gap-30">
            <div class="col-12">
                <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="tabs -active-purple-2 js-tabs">
                        <div class="tabs__content py-30 px-30 js-tabs-content">
                            <div class="tabs__pane -tab-item-1 is-active">
                                <div class="row y-gap-10 justify-between">
                                    <div class="col-auto">
                                        <form class="search-field border-light rounded-8 h-50"
                                            action="https://creativelayers.net/themes/educrat-html/post">
                                            <input class="bg-white -dark-bg-dark-2 pr-50" type="text"
                                                placeholder="Search Courses">
                                            <button class="" type="submit">
                                                <i class="icon-search text-light-1 text-20"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex flex-wrap y-gap-10 x-gap-20">
                                            <div>

                                                <div class="dropdown js-dropdown js-category-active">
                                                    <div class="dropdown__button d-flex items-center text-14 bg-white -dark-bg-dark-2 border-light rounded-8 px-20 py-10 text-14 lh-12"
                                                        data-el-toggle=".js-category-toggle"
                                                        data-el-toggle-active=".js-category-active">
                                                        <span class="js-dropdown-title">Categories</span>
                                                        <i class="icon text-9 ml-40 icon-chevron-down"></i>
                                                    </div>

                                                    <div
                                                        class="toggle-element -dropdown -dark-bg-dark-2 -dark-border-white-10 js-click-dropdown js-category-toggle">
                                                        <div class="text-14 y-gap-15 js-dropdown-list">
                                                            @foreach ($categories as $categorie)
                                                                <div><a href="#"
                                                                        class="d-block js-dropdown-link">{{ $categorie->nom }}
                                                                    </a></div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    @foreach ($articles as $article)
                                        
                                <div class="row y-gap-30 pt-30">
                                    <div class="col-xl-4">
                                        <div class="relative">
                                            <img class="rounded-8 w-1/1" src="{{ asset('storage/' . $article->image) }}"
                                                alt="image">
                                        </div>

                                        <div class="pt-15">

                                            <a class="text-16 fw-500 lh-15 mt-10 justify-center" href="">{{  Str::limit($article->titre, 50) }}</a>
                                        </div>
                                    </div>


                                    <div class="row justify-center pt-30">
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
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection
