@extends('v1.admin.base')
@section('title', 'Articles')
@section('isActive8')
active
@endsection
@section('content')
<div class="page-content-wrapper border">

    <!-- Title -->
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="h3 mb-2 mb-sm-0">Gestion des cours</h1>
        </div>
    </div>

    <div class="row g-4">
        <!-- Left side START -->
        <div class="col-xl-3">
            <!-- Tab START -->
            <ul class="nav nav-pills nav-tabs-bg-dark flex-column">
                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tab-1"><i class="fas fa-globe fa-fw me-2"></i>Website Settings</a> </li>
                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab-2"><i class="fas fa-cog fa-fw me-2"></i>Medias</a> </li>
            </ul>
            <!-- Tab END -->
        </div>
        <!-- Left side END -->

        <!-- Right side START -->
        <div class="col-xl-9">

            <!-- Tab Content START -->
            <div class="tab-content">

                <!-- Personal Information content START -->
                <div class="tab-pane show active" id="tab-1">
                    <div class="card shadow">

                        <!-- Card header -->
                        <div class="card-header border-bottom">
                            <h5 class="card-header-title">Informations du cours</h5>
                        </div>

                        <!-- Card body START -->
                        <div class="card-body">
                            <form class="row g-4 align-items-center">
    
                                <!-- Input item -->
                                <div class="col-lg-4">
                                    <label class="form-label">Site Name</label>
                                    <input type="text" class="form-control" placeholder="Site Name">
                                </div>

                                <!-- Input item -->
                                <div class="col-lg-4">
                                    <label class="form-label">Site Copyrights</label>
                                    <input type="text" class="form-control" placeholder="Site Copyrights">
                                </div>

                                <!-- Input item -->
                                <div class="col-lg-4">
                                    <label class="form-label">Site Email</label>
                                    <input type="email" class="form-control" placeholder="Site Email">
                                </div>
    
                                <!-- Textarea item -->
                                <div class="col-12">
                                    <label class="form-label">Site Description</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>

                                <!-- Input item -->
                                <div class="col-lg-6">
                                    <label class="form-label">Contact Phone</label>
                                    <input type="text" class="form-control" placeholder="Contact Phone">
                                </div>

                                <!-- Input item -->
                                <div class="col-lg-6">
                                    <label class="form-label">Support Email</label>
                                    <input type="email" class="form-control" placeholder="Support Email">
                                </div>

                                <!-- Radio items -->
                                <div class="col-lg-6">
                                    <label class="form-label">Statut du cours</label>
                                    <div class="d-sm-flex">
                                        <!-- Radio -->
                                        <div class="form-check radio-bg-light me-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Enable
                                            </label>
                                        </div>
                                    <!-- Radio -->
                                        <div class="form-check radio-bg-light me-4">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Disable
                                            </label>
                                        </div>
                                    <!-- Radio -->
                                        <div class="form-check radio-bg-light">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                On Request
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Textarea item -->
                                <div class="col-12">
                                    <label class="form-label">Contact Address</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
    
                                <!-- Save button -->
                                <div class="d-sm-flex justify-content-end">
                                    <button type="button" class="btn btn-primary mb-0">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                        <!-- Card body END -->

                    </div>			
                </div>

                <div class="tab-pane" id="tab-2">

                    <div class="card shadow">

                        <!-- Card header -->
                        <div class="card-header border-bottom">
                            <h5 class="card-header-title">Medias</h5>
                        </div>

                        <!-- Card body START -->
                        <div class="card-body">
                            <form class="row g-4">

                                <!-- Input item -->
                                <div class="col-12">
                                    <label class="form-label">Main Site URL</label>
                                    <input type="text" class="form-control" placeholder="Site URL">
                                </div>

                                   <!-- Choice item -->
                                   <div class="col-lg-6">
                                    <label class="form-label">Select Categorie</label>
                                    <select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
                                        <option value="">Select Categorie</option>
                                        <option>Dev</option>
                                        <option>Reseau</option>
                                    </select>
                                </div>

                                <!-- Choice item -->
                                <div class="col-lg-6">
                                    <label class="form-label">Select Currency</label>
                                    <select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
                                        <option value="">Select Currency</option>
                                        <option>USD</option>
                                        <option>Indian Rupee</option>
                                        <option>Euro</option>
                                        <option>British Pound</option>
                                    </select>
                                </div>

                                <!-- Choice item -->
                                <div class="col-lg-6">
                                    <label class="form-label">Select Language</label>
                                    <select class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
                                        <option value="">Select Language</option>
                                        <option>English</option>
                                        <option>Hindi</option>
                                        <option>German</option>
                                        <option>Spanish</option>
                                    </select>
                                </div>

    
                                <!-- Save button -->
                                <div class="d-sm-flex justify-content-end">
                                    <button type="button" class="btn btn-primary mb-0">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- Card body END -->

                    </div>
                </div>
                <!-- Medias content END -->

            </div>
            <!-- Tab Content END -->
        </div>
        <!-- Right side END -->
    </div> <!-- Row END -->		
</div>
@endsection
