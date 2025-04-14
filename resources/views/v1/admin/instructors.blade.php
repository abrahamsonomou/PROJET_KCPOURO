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
        <div class="col-12">
            <h1 class="h3 mb-2 mb-sm-0">instructors</h1>
        </div>
    </div>
        
    <div class="card bg-transparent">

        <!-- Card header START -->
        <div class="card-header bg-transparent border-bottom px-0">
            <!-- Search and select START -->
            <div class="row g-3 align-items-center justify-content-between">

                <!-- Search bar -->
                <div class="col-md-8">
                    <form class="rounded position-relative">
                        <input class="form-control bg-transparent" type="search" placeholder="Search" aria-label="Search">
                        <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                            <i class="fas fa-search fs-6 "></i>
                        </button>
                    </form>
                </div>

                <!-- Tab button -->
                <div class="col-md-3">
                    <!-- Tabs START -->
                    <ul class="list-inline mb-0 nav nav-pills nav-pill-dark-soft border-0 justify-content-end" id="pills-tab" role="tablist">
                        <!-- Grid tab -->
                        <li class="nav-item">
                            <a href="#nav-preview-tab-1" class="nav-link mb-0 me-2 active" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-th-large"></i>
                            </a>
                        </li>
                        <!-- List tab -->
                        <li class="nav-item">
                            <a href="#nav-html-tab-1" class="nav-link mb-0" data-bs-toggle="tab">
                                <i class="fas fa-fw fa-list-ul"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Tabs end -->
                </div>
            </div>
            <!-- Search and select END -->
        </div>
        <!-- Card header END -->

        <!-- Card body START -->
        <div class="card-body px-0">

            <!-- Tabs content START -->
            <div class="tab-content">

                <!-- Tabs content item START -->
                <div class="tab-pane fade show active" id="nav-preview-tab-1">
                    <div class="row g-4">
                        @foreach($instructors as $instructor)

                        <div class="col-md-6 col-xxl-4">
                            <div class="card bg-transparent border h-100"> 
                                <!-- Card header -->
                                <div class="card-header bg-transparent border-bottom d-flex justify-content-between">
                                    <div class="d-sm-flex align-items-center">
                                        <!-- Avatar -->
                                        <div class="avatar avatar-md flex-shrink-0">
                                            <img class="avatar-img rounded-circle" src="{{ $instructor->avatar ? asset('storage/users/avatar/' . $instructor->avatar) : asset('assets/img/general/avatar-1.png') }}" alt="avatar" alt="avatar">
                                        </div>
                                        <!-- Info -->
                                        <div class="ms-0 ms-sm-2 mt-2 mt-sm-0">
                                            <h5 class="mb-0"><a href="#">{{ $instructor->first_name ?? $instructor->email }}
                                                {{ $instructor->last_name ?? '' }}</a></h5>
                                            <span class="text-body small"><i class="fas fa-fw fa-map-marker-alt me-1 mt-1"></i>{{ $instructor->pays->nom ?? '' }}</span>
                                        </div>
                                    </div>

                                    <!-- Edit dropdown -->
                                    <div class="dropdown text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-round small mb-0" role="button" id="dropdownShare2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots fa-fw"></i>
                                        </a>
                                        <!-- dropdown button -->
                                        <ul class="dropdown-menu dropdown-w-sm dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare2">
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square fa-fw me-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash fa-fw me-2"></i>Remove</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body">
                                    {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-md bg-success bg-opacity-10 text-success rounded-circle flex-shrink-0"><i class="bi bi-currency-dollar fa-fw"></i></div>
                                            <h6 class="mb-0 ms-2 fw-light">Payments</h6>
                                        </div>
                                        <span class="mb-0 fw-bold">$6,205</span>
                                    </div> --}}

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-md bg-orange bg-opacity-10 text-orange rounded-circle flex-shrink-0"><i class="fas fa-user-graduate fa-fw"></i></div>
                                            <h6 class="mb-0 ms-2 fw-light">Total Students</h6>
                                        </div>
                                        <span class="mb-0 fw-bold">5,354</span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon-md bg-purple bg-opacity-10 text-purple rounded-circle flex-shrink-0"><i class="fas fa-book fa-fw"></i></div>
                                            <h6 class="mb-0 ms-2 fw-light">Total Course</h6>
                                        </div>
                                        <span class="mb-0 fw-bold">21</span>
                                    </div>
                                    
                                    {{-- <div class="overflow-hidden">
                                        <h6 class="mb-0">85%</h6>
                                        <div class="progress progress-sm bg-primary bg-opacity-10">
                                            <div class="progress-bar bg-primary aos" role="progressbar" data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                                <!-- Card footer -->
                                <div class="card-footer bg-transparent border-top">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <!-- Rating star -->
                                        <h6 class="mb-2 mb-sm-0">
                                            <i class="bi bi-calendar fa-fw text-orange me-2"></i><span class="text-body">Join at:</span> {{ $instructor->created_at ?? '' }}
                                        </h6>
                                        <!-- Buttons -->
                                        <div class="text-end text-primary-hover">
                                            <a href="#" class="btn btn-link text-body p-0 mb-0 me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Message" aria-label="Message">
                                                <i class="bi bi-envelope-fill"></i>
                                            </a>
                                            <a href="#" class="btn btn-link text-body p-0 mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Block" aria-label="Block">
                                                <i class="fas fa-ban"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-html-tab-1">
                    <div class="table-responsive border-0">
                        <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                            <!-- Table head -->
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">instructor name</th>
                                    <th scope="col" class="border-0">Join date</th>
                                    <th scope="col" class="border-0">Total studentss</th>
                                    {{-- <th scope="col" class="border-0">Courses</th> --}}
                                    <th scope="col" class="border-0 rounded-end">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($instructors as $instructor)

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center position-relative">
                                            <!-- Image -->
                                            <div class="avatar avatar-md">
                                                <img src="{{ $instructor->avatar ? asset('storage/users/avatar/' . $instructor->avatar) : asset('assets/img/general/avatar-1.png') }}" alt="avatar" class="rounded-circle">
                                            </div>
                                            <div class="mb-0 ms-3">
                                                <!-- Title -->
                                                <h6 class="mb-0"><a href="#" class="stretched-link"> {{ $instructor->first_name ?? $instructor->email }}
                                                    {{ $instructor->last_name ?? '' }}</a></h6>
                                                <span class="text-body small"><i class="fas fa-fw fa-map-marker-alt me-1 mt-1"></i>{{ $instructor->pays->nom ?? '' }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td>{{ $instructor->created_at ?? '' }}</td>
                                    <td>22</td>

                                    {{-- <td class="text-center text-sm-start">
                                        <div class="overflow-hidden">
                                            <h6 class="mb-0">85%</h6>
                                            <div class="progress progress-sm bg-primary bg-opacity-10">
                                                <div class="progress-bar bg-primary aos" role="progressbar" data-aos="slide-right" data-aos-delay="200" data-aos-duration="1000" data-aos-easing="ease-in-out" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </td> --}}

                                    {{-- <td>21</td> --}}

                                    <td>
                                        <a href="#" class="btn btn-light btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-light btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Message">
                                            <i class="bi bi-envelope"></i>
                                        </a>
                                        <button class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Block">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer bg-transparent pt-0 px-0">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft mb-0 pb-0 px-0">
                        <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                        <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection
