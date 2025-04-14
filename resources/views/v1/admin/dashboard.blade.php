@extends('v1.admin.base')
@section('title', 'Dashboard')
@section('isActive1')
active
@endsection
@section('content')

<div class="page-content-wrapper border">

    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="h3 mb-2 mb-sm-0">Dashboard</h1>
        </div>
    </div>

    {{-- <div class="row g-4 mb-4">
        <div class="col-md-6 col-xxl-3">
            <div class="card card-body bg-warning bg-opacity-15 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Digit -->
                    <div>
                        <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1958" data-purecounter-delay="200">0</h2>
                        <span class="mb-0 h6 fw-light">Completed Courses</span>
                    </div>
                    <!-- Icon -->
                    <div class="icon-lg rounded-circle bg-warning text-white mb-0"><i class="fas fa-tv fa-fw"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-3">
            <div class="card card-body bg-purple bg-opacity-10 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Digit -->
                    <div>
                        <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1600"	data-purecounter-delay="200">0</h2>
                        <span class="mb-0 h6 fw-light">Enrolled Courses</span>
                    </div>
                    <!-- Icon -->
                    <div class="icon-lg rounded-circle bg-purple text-white mb-0"><i class="fas fa-user-tie fa-fw"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-3">
            <div class="card card-body bg-primary bg-opacity-10 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Digit -->
                    <div>
                        <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="1235"	data-purecounter-delay="200">0</h2>
                        <span class="mb-0 h6 fw-light">Course In Progress</span>
                    </div>
                    <!-- Icon -->
                    <div class="icon-lg rounded-circle bg-primary text-white mb-0"><i class="fas fa-user-graduate fa-fw"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-3">
            <div class="card card-body bg-success bg-opacity-10 p-4 h-100">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Digit -->
                    <div>
                        <div class="d-flex">
                            <h2 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="845"	data-purecounter-delay="200">0</h2>
                            <span class="mb-0 h2 ms-1">hrs</span>
                        </div>
                        <span class="mb-0 h6 fw-light">Total Watch Time</span>
                    </div>
                    <!-- Icon -->
                    <div class="icon-lg rounded-circle bg-success text-white mb-0"><i class="bi bi-stopwatch-fill fa-fw"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-lg-6 col-xxl-4">
            <div class="card shadow h-100">

                <div class="card-header border-bottom d-flex justify-content-between align-items-center p-4">
                    <h5 class="card-header-title">Top Instructors</h5>
                    <a href="#" class="btn btn-link p-0 mb-0">View all</a>
                </div>

                <div class="card-body p-4">

                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                            <div class="avatar avatar-md flex-shrink-0">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
                            </div>
                            <div class="ms-0 ms-sm-2 mt-2 mt-sm-0">
                                <h6 class="mb-1">Lori Stevens<i class="bi bi-patch-check-fill text-info small ms-1"></i></h6>
                                <ul class="list-inline mb-0 small">
                                    <li class="list-inline-item fw-light me-2 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-1"></i>25 Courses</li>
                                    <li class="list-inline-item fw-light me-2 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-1"></i>4.5/5.0</li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="btn btn-sm btn-light mb-0">View</a>
                    </div>

                    <hr>

                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div class="d-sm-flex align-items-center mb-1 mb-sm-0">
                            <div class="avatar avatar-md flex-shrink-0">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
                            </div>
                            <div class="ms-0 ms-sm-2 mt-2 mt-sm-0">
                                <h6 class="mb-1">Dennis Barrett</h6>
                                <ul class="list-inline mb-0 small">
                                    <li class="list-inline-item fw-light me-2 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-1"></i>18 Courses</li>
                                    <li class="list-inline-item fw-light me-2 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-1"></i>4.5/5.0</li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="btn btn-sm btn-light mb-0">View</a>
                    </div>

                    
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xxl-4">
            <div class="card shadow h-100">
                <div class="card-header border-bottom p-4">
                    <h5 class="card-header-title">Notice board</h5>
                </div>

                <div class="card-body p-4">
                    <div class="custom-scrollbar h-300px">

                        <div class="d-flex justify-content-between position-relative">
                            <div class="d-sm-flex">
                                <div class="icon-lg bg-purple bg-opacity-10 text-purple rounded-2 flex-shrink-0"><i class="fas fa-user-tie fs-5"></i></div>
                                <div class="ms-0 ms-sm-3 mt-2 mt-sm-0">
                                    <h6 class="mb-0"><a href="#" class="stretched-link">Join New Instructor</a></h6>
                                    <p class="mb-0">Amongst moments do in arrived Fat weddings believed prospect</p>
                                    <span class="small">5 min ago</span>
                                </div>
                            </div>
                        </div>

                        <hr>

                    </div>
                </div>

                <div class="card-footer border-top">
                    <div class="alert alert-success d-flex align-items-center mb-0 py-2">
                        <div>
                            <small class="mb-0">45 more notices listed</small>
                        </div>
                        <div class="ms-auto">
                            <a class="btn btn-sm btn-success-soft mb-0" href="#!"> View all </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4">
            <div class="card shadow h-100">
                <div class="card-header border-bottom d-flex justify-content-between align-items-center p-4">
                    <h5 class="card-header-title">Support Requests</h5>
                    <a href="#" class="btn btn-link p-0 mb-0">View all</a>
                </div>

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between position-relative">
                        <div class="d-sm-flex">
                            <div class="avatar avatar-md flex-shrink-0">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
                            </div>
                            <div class="ms-0 ms-sm-2 mt-2 mt-sm-0">
                                <h6 class="mb-0"><a href="#" class="stretched-link">Lori Stevens</a></h6>
                                <p class="mb-0">New ticket #759 from Lori Stevens for General Enquiry</p>
                                <span class="small">8 hour ago</span>
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                </div>
            </div>
        </div>

    </div> --}}

</div>

@endsection
