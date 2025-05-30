@extends('v1.admin.base')
@section('title', 'Dashboard')
@section('isActive7')
active
@endsection
@section('content')

<div class="page-content-wrapper border">

    <!-- Title -->
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="h3 mb-0">Reviews</h1>
        </div>
    </div>
    
    <!-- All review table START -->
    <div class="card card-body bg-transparent pb-0 border mb-4">

        <!-- Table START -->
        <div class="table-responsive border-0">
            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                <!-- Table head -->
                <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">#</th>
                        <th scope="col" class="border-0">Student Name</th>
                        <th scope="col" class="border-0">Course Name</th>
                        <th scope="col" class="border-0">Rating</th>
                        <th scope="col" class="border-0">Hide/Show</th>
                        <th scope="col" class="border-0 rounded-end">Action</th>
                    </tr>
                </thead>

                <!-- Table body START -->
                <tbody>

                    <!-- Table row -->
                    <tr>
                        <!-- Table data -->
                        <td>01</td>

                        <!-- Table data -->
                        <td>
                            <div class="d-flex align-items-center position-relative">
                                <!-- Image -->
                                <div class="avatar avatar-xs mb-2 mb-md-0">
                                    <img src="{{ asset('assets/images/avatar/09.jpg') }}" class="rounded-circle" alt="">
                                </div>
                                <div class="mb-0 ms-2">
                                    <!-- Title -->
                                    <h6 class="mb-0"><a href="#" class="stretched-link">Lori Stevens</a></h6>
                                </div>
                            </div>
                        </td>

                        <!-- Table data -->
                        <td>
                            <h6 class="table-responsive-title mb-0"><a href="#">Building Scalable APIs with GraphQL</a></h6>
                        </td>

                        <!-- Table data -->
                        <td>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                            </ul>
                        </td>

                        <!-- Table data -->
                        <td>
                            <div class="form-check form-switch form-check-md">
                                <input class="form-check-input" type="checkbox" id="checkPrivacy1">
                            </div>
                        </td>

                        <!-- Table data -->
                        <td>
                            <a href="#" class="btn btn-success-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-danger-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                            <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                        </td>
                    </tr>

                </tbody>
                <!-- Table body END -->
            </table>
        </div>
        <!-- Table END -->

        <!-- Card footer START -->
        <div class="card-footer bg-transparent px-0">
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
    <!-- All review table END -->

    {{-- <div class="row g-4">
        <!-- Top rated course table START -->
        <div class="col-xxl-7">
            <div class="card bg-transparent border h-100">

                <!-- Card header -->
                <div class="card-header bg-light border-bottom">
                    <h5 class="mb-0">Top Rated Courses</h5>
                </div>

                <!-- Card body START -->
                <div class="card-body pb-0">
                    <!-- Table START -->
                    <div class="table-responsive border-0">
                        <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">

                            <!-- Table head -->
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">Course Name</th>
                                    <th scope="col" class="border-0">Enrolled</th>
                                    <th scope="col" class="border-0">Rating</th>
                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>

                            <!-- Table body START -->
                            <tbody>

                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="text-center text-sm-start d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="assets/images/courses/4by3/08.jpg" class="rounded" alt=""></div>
                                        <h6 class="mb-0 ms-2"><a href="#" class="stretched-link">Building Scalable APIs with GraphQL</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>2,568</td>

                                    <!-- Table data -->
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                        </ul>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-success-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button class="btn btn-danger-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                                    </td>
                                </tr>

                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="text-center text-sm-start d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="assets/images/courses/4by3/02.jpg" class="rounded" alt=""></div>
                                        <h6 class="mb-0 ms-2"><a href="#" class="stretched-link">Graphic Design Masterclass</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>1,858</td>

                                    <!-- Table data -->
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                        </ul>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-success-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button class="btn btn-danger-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                                    </td>
                                </tr>

                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="text-center text-sm-start d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="assets/images/courses/4by3/04.jpg" class="rounded" alt=""></div>
                                        <h6 class="mb-0 ms-2"><a href="#" class="stretched-link">Learn Invision</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>6,845</td>

                                    <!-- Table data -->
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                        </ul>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-success-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button class="btn btn-danger-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                                    </td>
                                </tr>

                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="text-center text-sm-start d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="assets/images/courses/4by3/07.jpg" class="rounded" alt=""></div>
                                        <h6 class="mb-0 ms-2"><a href="#" class="stretched-link">Deep Learning with React-Native</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>3,845</td>

                                    <!-- Table data -->
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
                                        </ul>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-success-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button class="btn btn-danger-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                                    </td>
                                </tr>

                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="text-center text-sm-start d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="assets/images/courses/4by3/10.jpg" class="rounded" alt=""></div>
                                        <h6 class="mb-0 ms-2"><a href="#" class="stretched-link">Bootstrap 5 From Scratch</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>1,458</td>

                                    <!-- Table data -->
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
                                        </ul>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-success-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button class="btn btn-danger-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                                    </td>
                                </tr>

                            </tbody>
                            <!-- Table body END -->
                        </table>
                    </div>
                    <!-- Table END -->
                </div>
                <!-- Card body END -->

                <!-- Card footer START -->
                <div class="card-footer bg-transparent">
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
        </div>
        <!-- Top rated course table END -->

        <!-- Chart START -->
        <div class="col-xxl-5">
            <div class="card bg-transparent border h-100">

                <!-- Card header -->
                <div class="card-header bg-light border-bottom">
                    <h5 class="mb-0">Reviews Analytics</h5>
                </div>

                <!-- Card body START -->
                <div class="card-body pb-0">

                    <!-- Chart detail -->
                    <div class="row">
                        <div class="col-sm-6 mb-4">
                            <div class="bg-success bg-opacity-10 p-4 rounded">
                                <p class="mb-0">Total Positive Review</p>
                                <h5 class="mb-0">85%</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <div class="bg-danger bg-opacity-10 p-4 rounded">
                                <p class="mb-0">Total Negative Review</p>
                                <h5 class="mb-0">15%</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="mb-3 mb-xl-0 d-flex justify-content-center" id="apexChartPageViews"></div>
                </div>
                <!-- Card body START -->
            </div>
        </div>	
    </div>  --}}
    <!-- Row END -->
</div>

@endsection
