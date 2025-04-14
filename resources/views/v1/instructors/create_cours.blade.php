@extends('v1.instructors.base')
@section('title', 'Create course')
@section('isActive4')
-is-active -dark-bg-dark-2
@endsection
@section('content')

<div class="dashboard__content bg-light-4">
    <div class="row pb-50 mb-10">
      <div class="col-auto">

        <h1 class="text-30 lh-12 fw-700">Create New Course</h1>
        <div class="mt-10">Lorem ipsum dolor sit amet, consectetur.</div>

      </div>
    </div>


    <div class="row y-gap-60">
      <div class="col-12">
        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
          <div class="d-flex items-center py-20 px-30 border-bottom-light">
            <h2 class="text-17 lh-1 fw-500">Basic Information</h2>
          </div>

          <div class="py-30 px-30">
            <form class="contact-form row y-gap-30" action="#">

              <div class="col-12">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Title*</label>

                <input type="text" placeholder="Learn Figma - UI/UX Design Essential Training">
              </div>


              <div class="col-12">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Short Description*</label>

                <textarea placeholder="Description" rows="7"></textarea>
              </div>


              <div class="col-12">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Description*</label>

                <textarea placeholder="Description" rows="7"></textarea>
              </div>

              <div class="col-md-6">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Level*</label>
                <select name="langue" id="">
                    <option value="fr">Debutant</option>
                </select>
              </div>


              <div class="col-md-6">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Language*</label>
                <select name="langue" id="">
                    <option value="fr">Français</option>
                </select>
              </div>

               <div class="col-md-6">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Category*</label>
                <select name="langue" id="">
                    <option value="fr">Dev</option>
                </select>
              </div>

              <div class="col-md-4">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Prix *</label>
                <input type="text" placeholder="">
              </div>

              <div class="col-md-2">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Devise*</label>
                <select name="langue" id="">
                    <option value="fr">GNF</option>
                </select>
              </div>

              <div class="col-md-3">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Duree *</label>
                <input type="text" placeholder="">
              </div>

              <div class="col-md-3">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Nombre de leçons *</label>
                <input type="text" placeholder="">
              </div>

              <div class="col-md-3">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Certificate *</label>
                <select name="langue" id="">
                    <option value="fr">Yes</option>
                    <option value="fr">No</option>
                </select>
              </div>

              <div class="col-md-3">
                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Nombre de Quizz *</label>
                <input type="text" placeholder="">
              </div>


               <div class="col-md-6">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">What will students learn in your course?*</label>

                <textarea placeholder="Description" rows="7"></textarea>
              </div>


              <div class="col-md-6">

                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Requirements*</label>

                <textarea placeholder="Description" rows="7"></textarea>
              </div>

            </form>

          </div>
        </div>
      </div>

      {{-- <div class="col-12">
        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
          <div class="d-flex items-center py-20 px-30 border-bottom-light">
            <h2 class="text-17 lh-1 fw-500">Curriculum</h2>
          </div>

          <div class="py-30 px-30">
            <div class="row">
              <div class="col-12">
                <h4 class="text-16 lh-1 fw-500">Introduction to JavaScript</h4>
              </div>

              <div class="col-12">
                <div class="accordion -block-2 text-left js-accordion">

                  <div class="accordion__item -dark-bg-dark-1 mt-10">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="icon icon-drag mr-10"></div>
                        <span class="text-16 lh-14 fw-500 text-dark-1">Introduction</span>
                      </div>

                      <div class="d-flex x-gap-10 items-center">
                        <a href="#" class="icon icon-edit mr-5"></a>
                        <a href="#" class="icon icon-bin"></a>
                        <div class="accordion__icon mr-0">
                          <div class="d-flex items-center justify-center icon icon-chevron-down"></div>
                          <div class="d-flex items-center justify-center icon icon-chevron-up"></div>
                        </div>
                      </div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="d-flex x-gap-10 y-gap-10 flex-wrap">
                          <div>
                            <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500">Add Article +</a>
                          </div>
                          <div>
                            <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500">Add Article +</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion__item -dark-bg-dark-1 mt-10">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="icon icon-drag mr-10"></div>
                        <span class="text-16 lh-14 fw-500 text-dark-1">Installing Development Software</span>
                      </div>

                      <div class="d-flex x-gap-10 items-center">
                        <a href="#" class="icon icon-edit mr-5"></a>
                        <a href="#" class="icon icon-bin"></a>
                        <div class="accordion__icon mr-0">
                          <div class="d-flex items-center justify-center icon icon-chevron-down"></div>
                          <div class="d-flex items-center justify-center icon icon-chevron-up"></div>
                        </div>
                      </div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="d-flex x-gap-10 y-gap-10 flex-wrap">
                          <div>
                            <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500">Add Article +</a>
                          </div>
                          <div>
                            <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500">Add Article +</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion__item -dark-bg-dark-1 mt-10">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="icon icon-drag mr-10"></div>
                        <span class="text-16 lh-14 fw-500 text-dark-1">Hello World Project from GitHub</span>
                      </div>

                      <div class="d-flex x-gap-10 items-center">
                        <a href="#" class="icon icon-edit mr-5"></a>
                        <a href="#" class="icon icon-bin"></a>
                        <div class="accordion__icon mr-0">
                          <div class="d-flex items-center justify-center icon icon-chevron-down"></div>
                          <div class="d-flex items-center justify-center icon icon-chevron-up"></div>
                        </div>
                      </div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="d-flex x-gap-10 y-gap-10 flex-wrap">
                          <div>
                            <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500">Add Article +</a>
                          </div>
                          <div>
                            <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500">Add Article +</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="row pt-30">
              <div class="col-12">
                <h4 class="text-16 lh-1 fw-500">Introduction to JavaScript</h4>
              </div>

              <div class="col-12">
                <div class="accordion -block-2 text-left js-accordion">

                  <div class="accordion__item -dark-bg-dark-1 mt-10">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="icon icon-drag mr-10"></div>
                        <span class="text-16 lh-1 fw-500 text-dark-1">Introduction</span>
                      </div>

                      <div class="d-flex x-gap-10 items-center">
                        <a href="#" class="icon icon-edit mr-5"></a>
                        <a href="#" class="icon icon-bin"></a>
                        <div class="accordion__icon mr-0">
                          <div class="d-flex items-center justify-center icon icon-chevron-down"></div>
                          <div class="d-flex items-center justify-center icon icon-chevron-up"></div>
                        </div>
                      </div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="d-flex">
                          <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500">Add Article +</a>
                          <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500 ml-10">Add Article +</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion__item -dark-bg-dark-1 mt-10">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="icon icon-drag mr-10"></div>
                        <span class="text-16 lh-1 fw-500 text-dark-1">Installing Development Software</span>
                      </div>

                      <div class="d-flex x-gap-10 items-center">
                        <a href="#" class="icon icon-edit mr-5"></a>
                        <a href="#" class="icon icon-bin"></a>
                        <div class="accordion__icon mr-0">
                          <div class="d-flex items-center justify-center icon icon-chevron-down"></div>
                          <div class="d-flex items-center justify-center icon icon-chevron-up"></div>
                        </div>
                      </div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="d-flex">
                          <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500">Add Article +</a>
                          <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500 ml-10">Add Article +</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="accordion__item -dark-bg-dark-1 mt-10">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="icon icon-drag mr-10"></div>
                        <span class="text-16 lh-1 fw-500 text-dark-1">Hello World Project from GitHub</span>
                      </div>

                      <div class="d-flex x-gap-10 items-center">
                        <a href="#" class="icon icon-edit mr-5"></a>
                        <a href="#" class="icon icon-bin"></a>
                        <div class="accordion__icon mr-0">
                          <div class="d-flex items-center justify-center icon icon-chevron-down"></div>
                          <div class="d-flex items-center justify-center icon icon-chevron-up"></div>
                        </div>
                      </div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="d-flex">
                          <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500">Add Article +</a>
                          <a href="#" class="button -sm py-15 -purple-3 text-purple-1 fw-500 ml-10">Add Article +</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="row y-gap-20 justify-between pt-30">
              <div class="col-auto sm:w-1/1">
                <button class="button -md -outline-purple-1 text-purple-1 sm:w-1/1">Prev</button>
              </div>

              <div class="col-auto sm:w-1/1">
                <button class="button -md -purple-1 text-white sm:w-1/1">Next</button>
              </div>
            </div>
          </div>
        </div>
      </div> --}}


                   


      <div class="col-12">
        <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
          <div class="d-flex items-center py-20 px-30 border-bottom-light">
            <h2 class="text-17 lh-1 fw-500">Media</h2>
          </div>

          <div class="py-30 px-30">
            <div class="row y-gap-50">
              <div class="col-12">
                <form class="contact-form d-flex lg:flex-column">
                  <div class="w-1/1 ml-30 lg:ml-0 lg:mt-20">

                    <div class="form-upload col-12">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course thumbnail*</label>
                      <div class="form-upload__wrap">
                        <input type="text" name="name" placeholder="Cover-1.html">
                        <button class="button -dark-3 text-white">Upload Files</button>
                      </div>
                    </div>

                    <p class="mt-10">Upload your course image here. It must meet our course image quality standards to be accepted. Important guidelines: 750x440 pixels; .jpg, .jpeg,. gif, or .png. no text on the image.</p>
                  </div>
                </form>
              </div>

              <div class="col-12">
                <form class="contact-form d-flex lg:flex-column">
                  <div class="w-1/1 ml-30 lg:ml-0 lg:mt-20">

                    <div class="form-upload col-12">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Video URL*</label>
                      <div class="form-upload__wrap">
                        <input type="text" name="name" placeholder="Video-1.html">
                        {{-- <button class="button -dark-3 text-white">Upload Files</button> --}}
                      </div>
                    </div>

                    <p class="mt-10">Enter a valid video URL. Students who watch a well-made promo video are 5X more likely to enroll in your course.</p>
                  </div>
                </form>
              </div>
            </div>

            <div class="row y-gap-20 justify-between pt-30">
              {{-- <div class="col-auto">
                <button class="button -md -outline-purple-1 text-purple-1">Prev</button>
              </div> --}}

              <div class="col-auto">
                <button class="button -md -purple-1 text-white">Enregistrer</button>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

  </div>

@endsection
