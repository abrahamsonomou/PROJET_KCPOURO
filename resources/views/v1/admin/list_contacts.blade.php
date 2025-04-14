@extends('v1.admin.base')
@section('title', 'Contacts')
@section('isActive10')
active
@endsection
@section('content')
<div class="page-content-wrapper border">

    <!-- Title -->
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="h3 mb-0">Liste contacts</h1>
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
                        <th scope="col" class="border-0">Nom</th>
                        <th scope="col" class="border-0">Email</th>
                        <th scope="col" class="border-0">Message</th>
                        <th scope="col" class="border-0">Date</th>
                        <th scope="col" class="border-0 rounded-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($contacts as $contact)
                    <tr>
                        <!-- Table data -->
                        <td>{{$contact->id}}</td>

                        <!-- Table data -->
                        <td>
                            <div class="d-flex align-items-center position-relative">
                                <div class="mb-0 ms-2">
                                    <!-- Title -->
                                    <h6 class="mb-0">{{$contact->nom}}</h6>
                                </div>
                            </div>
                        </td>

                        <!-- Table data -->
                        <td>
                            <h6 class="table-responsive-title mb-0">{{$contact->email}}</h6>
                        </td>

                        <!-- Table data -->
                        <td>
                            <h6 class="table-responsive-title mb-0">{{$contact->message}}</h6>
                        </td>

                        <!-- Table data -->
                        <td>
                            <h6>21/05/2025</h6>
                        </td>

                        <td>
                            {{-- <button class="btn btn-danger-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                <i class="bi bi-trash"></i>
                            </button> --}}

                            <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer bg-transparent pt-0">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <p class="mb-0 text-center text-sm-start">Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} entries</p>
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        {{ $contacts->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>
@endsection
