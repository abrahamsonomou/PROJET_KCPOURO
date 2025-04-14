@extends('v1.admin.base')
@section('title', 'Enroulements')
@section('isActive2')
active
@endsection
@section('isActive6')
active
@endsection
@section('content')

<div class="page-content-wrapper border">
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="h3 mb-0">Enroulements</h1>
        </div>
    </div>
    <div class="card card-body bg-transparent pb-0 border mb-4">
        <div class="table-responsive border-0">
            <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                <thead>
                    <tr>
                        {{-- <th scope="col" class="border-0 rounded-start">#</th> --}}
                        <th scope="col" class="border-0">Apprenant</th>
                        <th scope="col" class="border-0">Cours</th>
                        <th scope="col" class="border-0">Date</th>
                        <th scope="col" class="border-0">taux_progression</th>
                        <th scope="col" class="border-0">Active</th>
                        <th scope="col" class="border-0">Etat</th>
                        <th scope="col" class="border-0 rounded-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enroulements as $enroulement)

                    <tr>
                        {{-- <td>01</td> --}}
                        <td>
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar avatar-xs flex-shrink-0">
                                    <img class="avatar-img rounded-circle" src="{{ $enroulement->user->avatar ? asset('storage/users/avatar/' . $enroulement->user->avatar) : asset('assets/img/general/avatar-1.png') }}" alt="avatar">
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-0 fw-light">{{ $enroulement->user->first_name ?? '' }} {{ $enroulement->user->last_name ?? '' }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center position-relative">
                                <div class="w-60px">
                                    <img src="{{ asset('storage/' . $enroulement->cours->image) }}" class="rounded" alt="">
                                </div>
                                <h6 class="table-responsive-title mb-0 ms-2">    
                                    <a href="#" class="stretched-link">{{ $enroulement->cours->titre }}</a>
                                </h6>
                            </div>
                        </td>
                        <td>
                            <h6>{{ $enroulement->date_inscription }}</h6>
                        </td>
                        <td>
                            <h6>{{ $enroulement->taux_progression }} %</h6>
                        </td>
                        <td> 
                            @if ($enroulement->active == 0)
                                <span class="badge bg-warning bg-opacity-15 text-warning">Inactif</span> 
                            @elseif($enroulement->active == 1)
                                <span class="badge bg-warning bg-opacity-15 text-success">Actif</span> 
                            @endif
                        </td>
                        <td> 
                            @if ($enroulement->etat == 0)
                                <span class="badge bg-warning bg-opacity-15 text-primary">Nouveau</span> 
                            @elseif($enroulement->etat == 1)
                                <span class="badge bg-warning bg-opacity-15 text-success">Approuvé</span> 
                            @elseif($enroulement->etat == 2)
                                <span class="badge bg-warning bg-opacity-15 text-danger">Rejeté</span> 
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-danger-soft btn-round me-1 mb-1 mb-md-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>

                            <form action="{{ route('admin.enroulements.toggleStatus', $enroulement->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                    @if ($enroulement->active == 0)
                                    <button type="submit" class="btn btn-sm btn-warning-soft me-1 mb-1 mb-md-0">
                                        Activer
                                    @else
                                        <button type="submit" class="btn btn-sm btn-danger-soft me-1 mb-1 mb-md-0">
                                            Désactiver
                                        @endif
                                </button>
                            </form>

                            <form action="{{ route('admin.enroulements.approve', $enroulement->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-success mt-2">Approuver</button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer bg-transparent px-0">
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
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
        </div>
    </div>
</div>
@endsection
