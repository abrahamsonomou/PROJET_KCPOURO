@extends('v1.admin.base')
@section('title', 'Instructors request')
@section('isActive6')
active
@endsection
@section('isActive4')
active
@endsection
@section('content')

<div class="page-content-wrapper border">

    <!-- Title -->
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="h3 mb-2 mb-sm-0">Instructor Requests</h1>
        </div>
    </div>

    <!-- Main card START -->
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
                        <select class="form-select js-choice border-0 z-index-9 bg-transparent" aria-label=".form-select-sm">
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
            <!-- Instructor request table START -->
            <div class="table-responsive border-0">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">

                    <!-- Table head -->
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 rounded-start">Instructor name</th>
                            <th scope="col" class="border-0">Subject</th>
                            <th scope="col" class="border-0">Requested Date</th>
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
                                    <div class="avatar avatar-md">
                                        <img src="assets/images/avatar/09.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="mb-0 ms-2">
                                        <!-- Title -->
                                        <h6 class="mb-0"><a href="#" class="stretched-link">Lori Stevens</a></h6>
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td class="text-center text-sm-start">
                                <h6 class="mb-0">HTML, css, bootstrap</h6>
                            </td>

                            <!-- Table data -->
                            <td>22 Oct 2021</td>

                            <!-- Table data -->
                            <td>
                                <a href="#" class="btn btn-success-soft me-1 mb-1 mb-lg-0">Accept</a>
                                <a href="#" class="btn btn-secondary-soft me-1 mb-1 mb-lg-0">Reject</a>
                                <a href="#" class="btn btn-primary-soft me-1 mb-0" data-bs-toggle="modal" data-bs-target="#appDetail">View App</a>
                            </td>

                            
                        </tr>

                        <!-- Table row -->
                        <tr>
                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Image -->
                                    <div class="avatar avatar-md">
                                        <img src="assets/images/avatar/01.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="mb-0 ms-2">
                                        <!-- Title -->
                                        <h6 class="mb-0"><a href="#" class="stretched-link">Carolyn Ortiz</a></h6>
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td class="text-center text-sm-start">
                                <h6 class="mb-0">Photoshop, Figma, Adobe XD</h6>
                            </td>

                            <!-- Table data -->
                            <td>06 Sep 2021</td>

                            <!-- Table data -->
                            <td>
                                <a href="#" class="btn btn-success-soft me-1 mb-1 mb-lg-0">Accept</a>
                                <a href="#" class="btn btn-secondary-soft me-1 mb-1 mb-lg-0">Reject</a>
                                <a href="#" class="btn btn-primary-soft me-1 mb-0" data-bs-toggle="modal" data-bs-target="#appDetail">View App</a>
                            </td>
                        </tr>

                        <!-- Table row -->
                        <tr>
                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Image -->
                                    <div class="avatar avatar-md">
                                        <img src="assets/images/avatar/03.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="mb-0 ms-2">
                                        <!-- Title -->
                                        <h6 class="mb-0"><a href="#" class="stretched-link">Dennis Barrett</a></h6>
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td class="text-center text-sm-start">
                                <h6 class="mb-0">Javascript, Java</h6>
                            </td>

                            <!-- Table data -->
                            <td>21 Jan 2021</td>

                            <!-- Table data -->
                            <!-- Table data -->
                            <td>
                                <a href="#" class="btn btn-success me-1 mb-1 mb-md-0 disabled">Accepted</a>
                                <a href="#" class="btn btn-primary-soft me-1 mb-0" data-bs-toggle="modal" data-bs-target="#appDetail">View App</a>
                            </td>
                        </tr>

                        <!-- Table row -->
                        <tr>
                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Image -->
                                    <div class="avatar avatar-md">
                                        <img src="assets/images/avatar/04.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="mb-0 ms-2">
                                        <!-- Title -->
                                        <h6 class="mb-0"><a href="#" class="stretched-link">Billy Vasquez</a></h6>
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td class="text-center text-sm-start">
                                <h6 class="mb-0">Maths, Chemistry</h6>
                            </td>

                            <!-- Table data -->
                            <td>25 Dec 2020</td>

                            <!-- Table data -->
                            <td>
                                <a href="#" class="btn btn-secondary me-1 mb-1 mb-md-0 disabled">Rejected</a>
                                <a href="#" class="btn btn-primary-soft me-1 mb-0" data-bs-toggle="modal" data-bs-target="#appDetail">View App</a>
                            </td>
                        </tr>

                        <!-- Table row -->
                        <tr>
                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Image -->
                                    <div class="avatar avatar-md">
                                        <img src="assets/images/avatar/05.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="mb-0 ms-2">
                                        <!-- Title -->
                                        <h6 class="mb-0"><a href="#" class="stretched-link">Jacqueline Miller</a></h6>
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td class="text-center text-sm-start">
                                <h6 class="mb-0">Python, Angular, React Native</h6>
                            </td>

                            <!-- Table data -->
                            <td>05 June 2020</td>

                            <!-- Table data -->
                            <td>
                                <a href="#" class="btn btn-success me-1 mb-1 mb-md-0 disabled">Accepted</a>
                                <a href="#" class="btn btn-primary-soft me-1 mb-0" data-bs-toggle="modal" data-bs-target="#appDetail">View App</a>
                            </td>
                        </tr>

                        <!-- Table row -->
                        <tr>
                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Image -->
                                    <div class="avatar avatar-md">
                                        <img src="assets/images/avatar/06.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="mb-0 ms-2">
                                        <!-- Title -->
                                        <h6 class="mb-0"><a href="#" class="stretched-link">Amanda Reed</a></h6>
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td class="text-center text-sm-start">
                                <h6 class="mb-0">After effect, Premiere pro</h6>
                            </td>

                            <!-- Table data -->
                            <td>14 Feb 2020</td>

                            <!-- Table data -->
                            <td>
                                <a href="#" class="btn btn-success me-1 mb-1 mb-md-0 disabled">Accepted</a>
                                <a href="#" class="btn btn-primary-soft me-1 mb-0" data-bs-toggle="modal" data-bs-target="#appDetail">View App</a>
                            </td>
                        </tr>

                        <!-- Table row -->
                        <tr>
                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Image -->
                                    <div class="avatar avatar-md">
                                        <img src="assets/images/avatar/07.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="mb-0 ms-2">
                                        <!-- Title -->
                                        <h6 class="mb-0"><a href="#" class="stretched-link">Samuel Bishop</a></h6>
                                    </div>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td class="text-center text-sm-start">
                                <h6 class="mb-0">PHP, WordPress, Shopify</h6>
                            </td>

                            <!-- Table data -->
                            <td>06 Jan 2020</td>

                            <!-- Table data -->
                            <td>
                                <a href="#" class="btn btn-secondary me-1 mb-1 mb-md-0 disabled">Rejected</a>
                                <a href="#" class="btn btn-primary-soft me-1 mb-0" data-bs-toggle="modal" data-bs-target="#appDetail">View App</a>
                            </td>
                        </tr>

                    </tbody>
                    <!-- Table body END -->
                </table>
            </div>
            <!-- Instructor request table END -->
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
    <!-- Main card END -->
</div>

<!-- Modal START -->
<div class="modal fade" id="appDetail" tabindex="-1" aria-labelledby="appDetaillabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			
			<!-- Modal header -->
			<div class="modal-header bg-dark">
				<h5 class="modal-title text-white" id="appDetaillabel">Applicant details</h5>
				<button type="button" class="btn btn-sm btn-light mb-0 ms-auto" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body p-5">
				<!-- Name -->
				<span class="small">Applicant Name:</span>
				<h6 class="mb-3">Jacqueline Miller</h6>

				<!-- Email -->
				<span class="small">Applicant Email id:</span>
				<h6 class="mb-3">example@gmail.com</h6>

				<!-- Phone number -->
				<span class="small">Applicant Phone number:</span>
				<h6 class="mb-3">+123 456 789 10</h6>

				<!-- Summary -->
				<span class="small">Summary:</span>
				<p class="text-dark mb-2">We focus a great deal on the understanding of behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn’t going to get the job done so that’s why this course is packed with practical hands-on examples that you can follow step by step.</p>
				<p class="text-dark mb-0">As it so contrasted oh estimating instrument. Size like body someone had. Are conduct viewing boy minutes warrant the expense? Tolerably behavior may admit daughters offending her ask own. Praise effect wishes change way and any wanted. Lively use looked latter regard had. Do he it part more last in.</p>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger-soft my-0" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>   
<!-- Modal END -->

@endsection
