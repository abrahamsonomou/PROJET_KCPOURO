@extends('v1.admin.base')
@section('title', 'Articles')
@section('isActive8')
active
@endsection
@section('content')

<div class="page-content-wrapper border">

    <!-- Title -->
    <div class="row mb-3">
        <div class="col-12 d-sm-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 mb-sm-0">Nombres articles: <span class="badge bg-orange bg-opacity-10 text-orange">245</span></h1>
            <a href="{{ route('admin.articles_create', ['id'=>1]) }}" class="btn btn-sm btn-primary mb-0">Create article</a>
        </div>
    </div>

    <!-- Card START -->
    <div class="card bg-transparent border">

        <!-- Card header START -->
        <div class="card-header bg-light border-bottom">
            <!-- Search and select START -->
            <div class="row g-3 align-items-center justify-content-between">

                <!-- Search bar -->
                <div class="col-md-8">
                    <form class="rounded position-relative">
                        <input class="form-control bg-body" type="search" placeholder="Search" aria-label="Search">
                        <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                            <i class="fas fa-search fs-6 "></i>
                        </button>
                    </form>
                </div>

                <!-- Select option -->
                <div class="col-md-3">
                    <!-- Short by filter -->
                    <form>
                        <select class="form-select js-choice border-0 z-index-9" aria-label=".form-select-sm">
                            <option value="">Sort by</option>
                            <option>Newest</option>
                            <option>Oldest</option>
                            <option>Accepted</option>
                            <option>Rejected</option>
                        </select>
                    </form>
                </div>
            </div>
            <!-- Search and select END -->
        </div>
        <!-- Card header END -->

        <!-- Card body START -->
        <div class="card-body">
            <!-- Course table START -->
            <div class="table-responsive border-0 rounded-3">
                <!-- Table START -->
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 rounded-start">Article</th>
                            <th scope="col" class="border-0">Auteur</th>
                            <th scope="col" class="border-0">Categorie</th>
                            <th scope="col" class="border-0">Date creation</th>
                            <th scope="col" class="border-0 rounded-end">Action</th>
                        </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>
                        
                        <!-- Table row -->
                        <tr>
                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Image -->
                                    <div class="w-60px">
                                        <img src="{{ asset('assets/images/courses/4by3/08.jpg') }}" class="rounded" alt="">
                                    </div>
                                    <!-- Title -->
                                    <h6 class="table-responsive-title mb-0 ms-2">	
                                        <a href="#" class="stretched-link">Building Scalable APIs with GraphQL</a>
                                    </h6>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs flex-shrink-0">
                                        <img class="avatar-img rounded-circle" src="{{ asset('assets/images/avatar/09.jpg') }}" alt="avatar">
                                    </div>
                                    <!-- Info -->
                                    <div class="ms-2">
                                        <h6 class="mb-0 fw-light">Lori Stevens</h6>
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td>
                                Developpement
                            </td>

                            <!-- Table data -->
                            <td> 25/01/2025</td>

                            <!-- Table data -->
                            <td>
                                <a href="#" class="btn btn-sm btn-success me-1 mb-1 mb-md-0">Edit</a>
                                <button class="btn btn-sm btn-danger mb-0">Delete</button>
                            </td>
                        </tr>

                    </tbody>
                    <!-- Table body END -->
                </table>
                <!-- Table END -->
            </div>
            <!-- Course table END -->
        </div>
        <!-- Card body END -->

        <!-- Card footer START -->
        <div class="card-footer bg-transparent pt-0">
            <!-- Pagination START -->
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <!-- Content -->
                <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
                <!-- Pagination -->
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                        <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                </nav>
            </div>
            <!-- Pagination END -->
        </div>
        <!-- Card footer END -->
    </div>
    <!-- Card END -->
</div>

@endsection
