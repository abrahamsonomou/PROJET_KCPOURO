@extends('v1.admin.base')
@section('title', 'Instructors')
@section('isActive5')
active
@endsection
@section('isActive4')
active
@endsection
@section('content')

<div class="page-content-wrapper border">

    <!-- Title -->
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="h3 mb-2 mb-sm-0">Instructor detail</h1>
        </div>
    </div>
            
    <div class="row g-4">

        <!-- Personal information START -->
        <div class="col-xxl-7">
            <div class="card bg-transparent border rounded-3 h-100">

                <!-- Card header -->
                <div class="card-header bg-light border-bottom">
                    <h5 class="card-header-title mb-0">Personal Information</h5>
                </div>

                <!-- Card body START -->
                <div class="card-body">
                    <!-- Profile picture -->
                    <div class="avatar avatar-xl mb-3">
                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ asset('assets/images/avatar/07.jpg') }}" alt="">
                    </div>

                    <!-- Information START -->
                    <div class="row">

                        <!-- Information item -->
                        <div class="col-md-6">
                            <ul class="list-group list-group-borderless">
                                <li class="list-group-item">
                                    <span>Title:</span>
                                    <span class="h6 mb-0">Mr.</span>
                                </li>

                                <li class="list-group-item">
                                    <span>Full Name:</span>
                                    <span class="h6 mb-0">Louis Ferguson</span>
                                </li>

                                <li class="list-group-item">
                                    <span>User Name:</span>
                                    <span class="h6 mb-0">Lousifer</span>
                                </li>

                                <li class="list-group-item">
                                    <span>Mobile Number:</span>
                                    <span class="h6 mb-0">+123 456 789 10</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Information item -->
                        <div class="col-md-6">
                            <ul class="list-group list-group-borderless">
                                <li class="list-group-item">
                                    <span>Email ID:</span>
                                    <span class="h6 mb-0">example@gmail.com</span>
                                </li>

                                <li class="list-group-item">
                                    <span>Location:</span>
                                    <span class="h6 mb-0">California</span>
                                </li>

                                <li class="list-group-item">
                                    <span>Joining Date:</span>
                                    <span class="h6 mb-0">29 Aug 2019</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Information item -->
                        <div class="col-12">
                            <ul class="list-group list-group-borderless">
                                <li class="list-group-item">
                                    <span>Education:</span>
                                    <span class="h6 mb-0">Bachelor in Computer Graphics,</span>
                                    <span class="h6 mb-0">Masters in Computer Graphics</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Information item -->
                        <div class="col-12">
                            <ul class="list-group list-group-borderless">
                                <li class="list-group-item d-flex">
                                    <span>Description:</span>
                                    <p class="h6 mb-0">As it so contrasted oh estimating instrument. Size like body someone had. Are conduct viewing boy minutes warrant the expense Tolerably behavior may admit daughters offending her ask own. Praise effect wishes change way and any wanted. Lively use looked latter regard had. Do he it part more last in</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Information END -->
                </div>
                <!-- Card body END -->
            </div>
        </div>
        <!-- Personal information END -->

        <!-- Student status chart START -->
        <div class="col-xxl-5">
            <div class="row g-4">

                <!-- Active student START -->
                <div class="col-md-6 col-xxl-12">
                    <div class="card bg-transparent border overflow-hidden">
                        <!-- Card header -->
                        <div class="card-header bg-light border-bottom">
                            <h5 class="card-header-title mb-0">Active Students</h5>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-0">
                            <div class="d-sm-flex justify-content-between p-4">
                                <h4 class="text-blue mb-0">984</h4>
                                <p class="mb-0"><span class="text-success me-1">0.20%<i class="bi bi-arrow-up"></i></span>vs last Week</p>
                            </div>
                            <!-- Apex chart -->
                            <div id="activeChartstudent"></div>
                        </div>
                    </div>
                </div>
                <!-- Active student END -->

                <!-- Enrolled START -->
                <div class="col-md-6 col-xxl-12">
                    <div class="card bg-transparent border overflow-hidden">
                        <!-- Card header -->
                        <div class="card-header bg-light border-bottom">
                            <h5 class="card-header-title mb-0">New Enrollment</h5>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-0">
                            <div class="d-sm-flex justify-content-between p-4">
                                <h4 class="text-blue mb-0">140</h4>
                                <p class="mb-0"><span class="text-success me-1">0.35%<i class="bi bi-arrow-up"></i></span>vs last Week</p>
                            </div>
                            <!-- Apex chart -->
                            <div id="activeChartstudent2"></div>
                        </div>
                    </div>
                </div>
                <!-- Enrolled END -->

            </div>
        </div>
        <!-- Student status chart END -->
    
        <!-- Instructor course list START -->
        <div class="col-12">
            <div class="card bg-transparent border h-100">

                <!-- Card header -->
                <div class="card-header bg-light border-bottom">
                    <h5 class="mb-0">Courses List</h5>
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
                                    <th scope="col" class="border-0">Status</th>
                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>

                            <!-- Table body START -->
                            <tbody>
                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="{{ asset('assets/images/courses/4by3/08.jpg') }}" class="rounded" alt=""></div>
                                        <h6 class="table-responsive-title mb-0 ms-2"><a href="#" class="stretched-link">Building Scalable APIs with GraphQL</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>412</td>

                                    <!-- Table data -->
                                    <td>
                                        <span class="badge bg-success bg-opacity-15 text-success">Live</span>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0">View</a>
                                    </td>
                                </tr>

                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="{{ asset('assets/images/courses/4by3/02.jpg') }}" class="rounded" alt=""></div>
                                        <h6 class="table-responsive-title mb-0 ms-2"><a href="#" class="stretched-link">Graphic Design Masterclass</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>254</td>

                                    <!-- Table data -->
                                    <td>
                                        <span class="badge bg-success bg-opacity-15 text-success">Live</span>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0">View</a>
                                    </td>
                                </tr>

                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="{{ asset('assets/images/courses/4by3/04.jpg') }}" class="rounded" alt=""></div>
                                        <h6 class="table-responsive-title mb-0 ms-2"><a href="#" class="stretched-link">Learn Invision</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>0</td>

                                    <!-- Table data -->
                                    <td>
                                        <span class="badge bg-warning bg-opacity-15 text-warning">Pending</span>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0">View</a>
                                    </td>
                                </tr>

                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="{{ asset('assets/images/courses/4by3/07.jpg') }}" class="rounded" alt=""></div>
                                        <h6 class="table-responsive-title mb-0 ms-2"><a href="#" class="stretched-link">Deep Learning with React-Native</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>98</td>

                                    <!-- Table data -->
                                    <td>
                                        <span class="badge bg-success bg-opacity-15 text-success">Live</span>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0">View</a>
                                    </td>
                                </tr>

                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td class="d-flex align-items-center position-relative">
                                        <div class="w-60px"><img src="{{ asset('assets/images/courses/4by3/10.jpg') }}" class="rounded" alt=""></div>
                                        <h6 class="table-responsive-title mb-0 ms-2"><a href="#" class="stretched-link">Bootstrap 5 From Scratch</a></h6>
                                    </td>

                                    <!-- Table data -->
                                    <td>58</td>

                                    <!-- Table data -->
                                    <td>
                                        <span class="badge bg-danger bg-opacity-15 text-danger">Cancel</span>
                                    </td>

                                    <!-- Table data -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0">View</a>
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
        <!-- Instructor course list END -->

        <!-- Student review START -->
        <div class="col-12">
            <div class="card bg-transparent border">

                <!-- Card header START -->
                <div class="card-header border-bottom bg-light">
                    <h5 class="mb-0">All Reviews</h5>
                </div>
                <!-- Card header END -->
    
                <!-- Card body START -->
                <div class="card-body pb-0">
                    <!-- Table START -->
                    <div class="table-responsive border-0">
                        <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                            <!-- Table head -->
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">Student Name</th>
                                    <th scope="col" class="border-0">Course Name</th>
                                    <th scope="col" class="border-0">Rating</th>
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
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                                    </td>
                                </tr>
    
                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <!-- Image -->
                                            <div class="avatar avatar-xs mb-2 mb-md-0">
                                                <img src="assets/images/avatar/01.jpg" class="rounded-circle" alt="">
                                            </div>
                                            <div class="mb-0 ms-2">
                                                <!-- Title -->
                                                <h6 class="mb-0"><a href="#" class="stretched-link">Carolyn Ortiz</a></h6>
                                            </div>
                                        </div>
                                    </td>
    
                                    <!-- Table data -->
                                    <td>
                                        <h6 class="table-responsive-title mb-0"><a href="#">Graphic Design Masterclass</a></h6>
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
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                                    </td>
                                </tr>
    
                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <!-- Image -->
                                            <div class="avatar avatar-xs mb-2 mb-md-0">
                                                <img src="assets/images/avatar/03.jpg" class="rounded-circle" alt="">
                                            </div>
                                            <div class="mb-0 ms-2">
                                                <!-- Title -->
                                                <h6 class="mb-0"><a href="#" class="stretched-link">Dennis Barrett</a></h6>
                                            </div>
                                        </div>
                                    </td>
    
                                    <!-- Table data -->
                                    <td>
                                        <h6 class="table-responsive-title mb-0"><a href="#">Deep Learning with React-Native</a></h6>
                                    </td>
    
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
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                                    </td>
                                </tr>
    
                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <!-- Image -->
                                            <div class="avatar avatar-xs mb-2 mb-md-0">
                                                <img src="{{ asset('assets/images/avatar/04.jpg') }}" class="rounded-circle" alt="">
                                            </div>
                                            <div class="mb-0 ms-2">
                                                <!-- Title -->
                                                <h6 class="mb-0"><a href="#" class="stretched-link">Billy Vasquez</a></h6>
                                            </div>
                                        </div>
                                    </td>
    
                                    <!-- Table data -->
                                    <td>
                                        <h6 class="table-responsive-title mb-0"><a href="#">Bootstrap 5 From Scratch</a></h6>
                                    </td>
    
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
                                        <a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal" data-bs-target="#viewReview">View</a>
                                    </td>
                                </tr>
    
                                <!-- Table row -->
                                <tr>
                                    <!-- Table data -->
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <!-- Image -->
                                            <div class="avatar avatar-xs mb-2 mb-md-0">
                                                <img src="{{ asset('assets/images/avatar/05.jpg') }}" class="rounded-circle" alt="">
                                            </div>
                                            <div class="mb-0 ms-2">
                                                <!-- Title -->
                                                <h6 class="mt-2"><a href="#" class="stretched-link">Jacqueline Miller</a></h6>
                                            </div>
                                        </div>
                                    </td>
    
                                    <!-- Table data -->
                                    <td>
                                        <h6 class="table-responsive-title mb-0"><a href="#">Learn Invision</a></h6>
                                    </td>
    
                                    <!-- Table data -->
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
                                            <li class="list-inline-item me-0 small"><i class="far fa-star text-warning"></i></li>
                                        </ul>
                                    </td>
    
                                    <!-- Table data -->
                                    <td>
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
        <!-- Student review END -->

    </div> <!-- Row END -->
</div>

@endsection
