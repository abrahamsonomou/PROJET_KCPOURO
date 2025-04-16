@extends('v1.admin.base')
@section('title', 'Course')
@section('isActive2')
active
@endsection
@section('isActive5')
active
@endsection
@section('content')

<div class="page-content-wrapper border">

    <div class="row mb-3">
        <div class="col-12 d-sm-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 mb-sm-0">Courses</h1>
            <a href="{{ route('admin.cours.create') }}" class="btn btn-sm btn-primary mb-0">Create a Course</a>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Total Courses -->
        <div class="col-sm-6 col-lg-3">
            <div class="text-center p-4 bg-primary bg-opacity-10 border border-primary rounded-3">
                <h6>Total Courses</h6>
                <h2 class="mb-0 fs-1 text-primary">{{ $totalCours }}</h2>
            </div>
        </div>
    
        <!-- Activated Courses -->
        <div class="col-sm-6 col-lg-3">
            <div class="text-center p-4 bg-success bg-opacity-10 border border-success rounded-3">
                <h6>Activated Courses</h6>
                <h2 class="mb-0 fs-1 text-success">{{ $activatedCours }}</h2>
            </div>
        </div>
    
        <!-- Pending Courses -->
        <div class="col-sm-6 col-lg-3">
            <div class="text-center p-4 bg-warning bg-opacity-15 border border-warning rounded-3">
                <h6>Pending Courses</h6>
                <h2 class="mb-0 fs-1 text-warning">{{ $pendingCours }}</h2>
            </div>
        </div>
    
        <!-- Rejected Courses -->
        <div class="col-sm-6 col-lg-3">
            <div class="text-center p-4 bg-danger bg-opacity-10 border border-danger rounded-3">
                <h6>Rejected Courses</h6>
                <h2 class="mb-0 fs-1 text-danger">{{ $rejectedCours }}</h2>
            </div>
        </div>
    </div>
    

    <div class="card bg-transparent border">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
        <div class="card-header bg-light border-bottom">
            <div class="row g-3 align-items-center justify-content-between">
                <div class="col-md-8">
                    <form class="rounded position-relative" id="searchForm">
                        <input class="form-control bg-body" type="search" id="searchInput" placeholder="Search" aria-label="Search">
                        <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                            <i class="fas fa-search fs-6 "></i>
                        </button>
                    </form>
                </div>
                

                <div class="col-md-3">
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
        </div>
        <div class="card-body">
            <div class="table-responsive border-0 rounded-3">
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="border-0 rounded-start">Course Name</th>
                            <th scope="col" class="border-0">Instructor</th>
                            <th scope="col" class="border-0">Price</th>
                            <th scope="col" class="border-0">Status</th>
                            <th scope="col" class="border-0">Etat</th>
                            <th scope="col" class="border-0 rounded-end">Action</th>
                        </tr>
                    </thead>
        
                    <tbody id="courseTableBody">
                        @foreach($cours as $course)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center position-relative">
                                        <div class="w-60px">
                                            <img src="{{ asset($course->image) }}" class="rounded" alt="">
                                        </div>
                                        <h6 class="table-responsive-title mb-0 ms-2">    
                                            <a href="#" class="stretched-link">{{ $course->titre }}</a>
                                        </h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar avatar-xs flex-shrink-0">
                                            <img class="avatar-img rounded-circle" src="{{ asset($course->user->avatar) }}" alt="avatar">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 fw-light">{{ $course->user->first_name ?? 'Instructor' }} {{ $course->user->last_name ?? '' }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $course->prix }} {{ $course->devise->nom_court }}</td>
                                <td> 
                                    @if ($course->active == 0)
                                        <span class="badge bg-warning bg-opacity-15 text-warning">Inactif</span> 
                                    @elseif($course->active == 1)
                                        <span class="badge bg-warning bg-opacity-15 text-success">Actif</span> 
                                    @endif
                                </td>
                                <td> 
                                    @if ($course->etat == 0)
                                        <span class="badge bg-warning bg-opacity-15 text-primary">Nouveau</span> 
                                    @elseif($course->etat == 1)
                                        <span class="badge bg-warning bg-opacity-15 text-success">Approuvé</span> 
                                    @elseif($course->etat == 2)
                                        <span class="badge bg-warning bg-opacity-15 text-danger">Rejeté</span> 
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.cours.show', $course->id) }}" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">View</a>
                                    <a href="{{ route('admin.cours.edit', $course->id) }}" class="btn btn-sm btn-dark-soft me-1 mb-1 mb-md-0">Edit</a>
                                    <form action="{{ route('admin.cours.destroy', $course->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')" class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">Delete</button>
                                    </form>
                                    <form action="{{ route('admin.cours.toggleStatus', $course->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                            @if ($course->active == 0)
                                            <button type="submit" class="btn btn-sm btn-warning-soft me-1 mb-1 mb-md-0">
                                                Activer
                                            @else
                                                <button type="submit" class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">
                                                    Désactiver
                                                @endif
                                        </button>
                                    </form>                               
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-transparent pt-0">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <p class="mb-0 text-center text-sm-start">Showing {{ $cours->firstItem() }} to {{ $cours->lastItem() }} of {{ $cours->total() }} entries</p>
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        <!-- This will generate the previous and next page links automatically -->
                        {{ $cours->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>

        
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// $(document).ready(function() {
//     // Bind the input event to the search box
//     $('#searchInput').on('input', function() {
//         var query = $(this).val(); // Get the current value in the input field
        
//         if (query.length === 0) {
//             // If the input is empty, fetch all courses
//             fetchAllCourses();
//         } else {
//             // Otherwise, search with the query
//             $.ajax({
//                 url: '{{ route("admin.search") }}',  // The route for searching
//                 method: 'GET',
//                 data: { query: query },
//                 success: function(response) {
//                     updateTable(response);  // Update the table with search results
//                 }
//             });
//         }
//     });

//     // Function to fetch all courses (without search)
//     function fetchAllCourses() {
//         $.ajax({
//             url: '{{ route("admin.search") }}',  // The route for fetching all courses
//             method: 'GET',
//             data: { query: '' }, // Empty query to get all courses
//             success: function(response) {
//                 updateTable(response);  // Update the table with all courses
//             }
//         });
//     }

//     // Function to update the table with course data
//     function updateTable(courses) {
//         var resultsHtml = '';
//         if (courses.length > 0) {
//             courses.forEach(function(course) {
//                 resultsHtml += `
//                     <tr>
//                         <td>
//                             <div class="d-flex align-items-center position-relative">
//                                 <div class="w-60px">
//                                     <img src="${course.image}" class="rounded" alt="">
//                                 </div>
//                                 <h6 class="table-responsive-title mb-0 ms-2">${course.titre}</h6>
//                             </div>
//                         </td>
//                         <td>
//                             <div class="d-flex align-items-center mb-3">
//                                 <div class="avatar avatar-xs flex-shrink-0">
//                                     <img class="avatar-img rounded-circle" src="${course.user.avatar}" alt="avatar">
//                                 </div>
//                                 <div class="ms-2">
//                                     <h6 class="mb-0 fw-light">${course.user.first_name} ${course.user.last_name}</h6>
//                                 </div>
//                             </div>
//                         </td>
//                         <td>${course.prix} ${course.devise.nom_court}</td>
//                         <td>${course.active == 0 ? 'Inactif' : 'Actif'}</td>
//                         <td>${course.etat == 0 ? 'Nouveau' : course.etat == 1 ? 'Approuvé' : 'Rejeté'}</td>
//                         <td>
//                             <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">View</a>
//                             <a href="/admin/cours/edit/${course.id}" class="btn btn-sm btn-dark-soft me-1 mb-1 mb-md-0">Edit</a>
//                             <form action="/admin/cours/destroy/${course.id}" method="POST" style="display:inline;">
//                                 <button type="submit" class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">Delete</button>
//                             </form>
//                         </td>
//                     </tr>
//                 `;
//             });
//         } else {
//             resultsHtml = '<tr><td colspan="6">No results found.</td></tr>';
//         }

//         // Update the table body with the results
//         $('#courseTableBody').html(resultsHtml);
//     }

//     // Initially, load all courses when the page is loaded
//     fetchAllCourses();
// });

$(document).ready(function() {
    // Bind the input event to the search box
    $('#searchInput').on('input', function() {
        var query = $(this).val(); // Get the current value in the input field
        
        $.ajax({
            url: '{{ route("admin.search") }}',  // The route for searching
            method: 'GET',
            data: { query: query },
            success: function(response) {
                var resultsHtml = '';
                if (response.length > 0) {
                    response.forEach(function(course) {
                        resultsHtml += `
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center position-relative">
                                        <div class="w-60px">
                                            <img src="${course.image}" class="rounded" alt="">
                                        </div>
                                        <h6 class="table-responsive-title mb-0 ms-2">${course.titre}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar avatar-xs flex-shrink-0">
                                            <img class="avatar-img rounded-circle" src="${course.user.avatar}" alt="avatar">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 fw-light">${course.user.first_name} ${course.user.last_name}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>${course.prix} ${course.devise.nom_court}</td>
                                <td>${course.active == 0 ? 'Inactif' : 'Actif'}</td>
                                <td>${course.etat == 0 ? 'Nouveau' : course.etat == 1 ? 'Approuvé' : 'Rejeté'}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0">View</a>
                                    <a href="/admin/cours/edit/${course.id}" class="btn btn-sm btn-dark-soft me-1 mb-1 mb-md-0">Edit</a>
                                    <form action="/admin/cours/destroy/${course.id}" method="POST" style="display:inline;">
                                        <button type="submit" class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    resultsHtml = '<tr><td colspan="6">No results found.</td></tr>';
                }

                // Update the table body with the results
                $('#courseTableBody').html(resultsHtml);
            }
        });
    });
});

</script>


@endsection
