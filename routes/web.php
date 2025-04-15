<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\ServiceController;

use App\Http\Controllers\Site\CourseController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;

use App\Http\Controllers\Site\EvenementController;
use App\Http\Controllers\Site\InstructorController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\DashboardController;

use App\Http\Controllers\Student\sCoursesController;
use App\Http\Controllers\Student\sPanierController;
use App\Http\Controllers\Student\sDashboardController;
use App\Http\Controllers\Student\sSettingsController;

use App\Http\Controllers\Instructor\iArticlesController;
use App\Http\Controllers\Instructor\iCoursesController;
use App\Http\Controllers\Instructor\iDashboardController;
use App\Http\Controllers\Instructor\iSettingsController;
use App\Http\Controllers\Instructor\iReviewsController;

use App\Http\Controllers\Admin\aDashboardController;
use App\Http\Controllers\Admin\aReviewsController;
use App\Http\Controllers\Admin\aCoursesController;
use App\Http\Controllers\Admin\aArticlesController;
use App\Http\Controllers\Admin\aSettingsController;
use App\Http\Controllers\Admin\aInstructorsController;
use App\Http\Controllers\Admin\aContactsController;
use App\Http\Controllers\Admin\aStudentsController;

use App\Http\Controllers\Admin\aPaysController;
use App\Http\Controllers\Admin\aVillesController;
use App\Http\Controllers\Admin\aSlidesController;
use App\Http\Controllers\Admin\aServicesController;
use App\Http\Controllers\Admin\aEvenementsController;
use App\Http\Controllers\Admin\aPartenairesController;
use App\Http\Controllers\Admin\aDevisesController;
use App\Http\Controllers\Admin\aSpecialitesController;
use App\Http\Controllers\Admin\aPrerequisController;
use App\Http\Controllers\Admin\aNiveauController;
use App\Http\Controllers\Admin\aUsersController;
use App\Http\Controllers\Admin\aCategoriesController;
use App\Http\Controllers\Admin\aTagsController;
use App\Http\Controllers\Admin\aLanguesController;
use App\Http\Controllers\Admin\aBureauController;
use App\Http\Controllers\Admin\aIconesController;
use App\Http\Controllers\Admin\aTemoignagesController;


//site
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');

Route::get('/nos-services', [ServiceController::class, 'services'])->name('services');

Route::get('/cours', [CourseController::class, 'cours'])->name('cours');
Route::get('/cours/{id}/details', [CourseController::class, 'cours_details'])->name('cours.details');

Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog/details/{id}', [BlogController::class, 'blog_details'])->name('blog-details');
Route::get('/tags/{tagId}/articles', [BlogController::class, 'showByTag'])->name('tags.articles');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store_contact'])->name('contacts.store');
Route::get('/contact/success', [ContactController::class, 'contact_success'])->name('contact_success');

Route::get('/events', [EvenementController::class, 'events'])->name('events');
Route::get('/instructors', [authInstructorController::class, 'instructors'])->name('instructors');

// auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Routes spécifiques aux étudiants
Route::middleware(['role:student'])->prefix('students')->name('students.')->group(function () {
    Route::get('/my_cours', [sCoursesController::class, 'my_cours'])->name('my_cours');
    Route::get('/panier', [sPanierController::class, 'panier'])->name('panier');
    Route::get('/settings', [sSettingsController::class, 'settings'])->name('settings');
    Route::get('/dashboard', [sDashboardController::class, 'dashboard'])->name('dashboard');

    // Route::get('/profile', [ProfileController::class, 'show_profile'])->name('profile.show');
    // Route::put('/profile/update', [ProfileController::class, 'update_profile'])->name('profile.update');
});

// Routes spécifiques aux instructeurs
Route::middleware(['role:instructor'])->prefix('instructors')->name('instructors.')->group(function () {
    Route::get('/my_cours', [iCoursesController::class, 'my_cours'])->name('my_cours');
    Route::get('/create_cours', [iCoursesController::class, 'create_cours'])->name('create_cours');

    Route::get('/settings', [iSettingsController::class, 'settings'])->name('settings');
    Route::get('/dashboard', [iDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/my_articles', [iArticlesController::class, 'my_articles'])->name('my_articles');
    Route::get('/create_articles', [iArticlesController::class, 'create_articles'])->name('create_articles');
    Route::post('/articles/create', [iArticlesController::class, 'store'])->name('articles.store');
    Route::get('/reviews', [iReviewsController::class, 'reviews'])->name('reviews');


    // Route::get('/profile', [ProfileController::class, 'show_profile'])->name('profile.show');
    // Route::put('/profile/update', [ProfileController::class, 'update_profile'])->name('profile.update');
});

// Routes spécifiques aux administrateurs
Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [aDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/reviews', [aReviewsController::class, 'reviews'])->name('reviews');
    Route::get('/students', [aStudentsController::class, 'students'])->name('students');
    Route::get('/contacts', [aContactsController::class, 'contacts'])->name('contacts');
    Route::delete('/contacts/{id}', [aContactsController::class, 'contacts_delete'])->name('contacts.delete');

    Route::match(['get', 'post'], '/parametres', [aSettingsController::class, 'settings'])->name('settings');
    Route::get('/instructors/request', [aInstructorsController::class, 'instructors_request'])->name('instructors_request');
    Route::get('/instructors/details', [aInstructorsController::class, 'instructors_details'])->name('instructors_details');
    Route::get('/instructors', [aInstructorsController::class, 'instructors'])->name('instructors');

    Route::get('/cours/enroulements', [aCoursesController::class, 'enroulements'])->name('cours.enroulements');
    Route::post('/cours/{id}/approve', [aCoursesController::class, 'approveCourse'])->name('cours.approve');
    Route::post('/cours/{id}/reject', [aCoursesController::class, 'rejectCourse'])->name('cours.reject');
    Route::post('/cours/{id}/toggle-status', [aCoursesController::class, 'toggleCourseStatus'])->name('cours.toggleStatus');
    Route::get('/search', [aCoursesController::class, 'search'])->name('search');

    Route::post('/articles/{id}/approve', [aArticlesController::class, 'approvearticle'])->name('articles.approve');
    Route::post('/articles/{id}/reject', [aArticlesController::class, 'rejectarticle'])->name('articles.reject');
    Route::post('/articles/{id}/toggle-status', [aArticlesController::class, 'togglearticleStatus'])->name('articles.toggleStatus');
    
    Route::post('/enroulements/{id}/approve', [aCoursesController::class, 'approveenroulement'])->name('enroulements.approve');
    Route::post('/enroulements/{id}/toggle-status', [aCoursesController::class, 'toggleenroulementstatus'])->name('enroulements.toggleStatus');

    // // Gestion des entités (CRUD)
    // $entities = ['pays', 'villes', 'slides', 'services', 'evenements', 'partenaires', 'devises', 'specialites', 'prerequis', 'niveaux', 'users', 'categories', 'tags', 'cours', 'langues', 'bureaux', 'articles'];
    // foreach ($entities as $entity) {
    //     Route::prefix($entity)->name("$entity.")->group(function () use ($entity) {
    //         Route::get('/', [AdminController::class, "{$entity}_list"])->name('list');
    //         Route::get('/create', [AdminController::class, "{$entity}_create"])->name('create');
    //         Route::post('/', [AdminController::class, "{$entity}_store"])->name('store');
    //         Route::get('edit/{id}', [AdminController::class, "{$entity}_edit"])->name('edit');
    //         Route::get('{id}', [AdminController::class, "{$entity}_show"])->name('show');
    //         Route::put('{id}', [AdminController::class, "{$entity}_update"])->name('update');
    //         Route::delete('{id}', [AdminController::class, "{$entity}_destroy"])->name('destroy');
    //     });
    // }

        Route::prefix("pays")->name("pays.")->group(function (){
        Route::get('/', [aPaysController::class, "pays_list"])->name('list');
        Route::get('/create', [aPaysController::class, "pays_create"])->name('create');
        Route::post('/', [aPaysController::class, "pays_store"])->name('store');
        Route::get('edit/{id}', [aPaysController::class, "pays_edit"])->name('edit');
        Route::get('{id}', [aPaysController::class, "pays_show"])->name('show');
        Route::put('{id}', [aPaysController::class, "pays_update"])->name('update');
        Route::delete('{id}', [aPaysController::class, "pays_destroy"])->name('destroy');
        });


        Route::prefix("villes")->name("villes.")->group(function (){
            Route::get('/', [aVillesController::class, "villes_list"])->name('list');
            Route::get('/create', [aVillesController::class, "villes_create"])->name('create');
            Route::post('/', [aVillesController::class, "villes_store"])->name('store');
            Route::get('edit/{id}', [aVillesController::class, "villes_edit"])->name('edit');
            Route::get('{id}', [aVillesController::class, "villes_show"])->name('show');
            Route::put('{id}', [aVillesController::class, "villes_update"])->name('update');
            Route::delete('{id}', [aVillesController::class, "villes_destroy"])->name('destroy');
            });

            Route::prefix("slides")->name("slides.")->group(function (){
                Route::get('/', [aSlidesController::class, "slides_list"])->name('list');
                Route::get('/create', [aSlidesController::class, "slides_create"])->name('create');
                Route::post('/', [aSlidesController::class, "slides_store"])->name('store');
                Route::get('edit/{id}', [aSlidesController::class, "slides_edit"])->name('edit');
                Route::get('{id}', [aSlidesController::class, "slides_show"])->name('show');
                Route::put('{id}', [aSlidesController::class, "slides_update"])->name('update');
                Route::delete('{id}', [aSlidesController::class, "slides_destroy"])->name('destroy');
                });

                Route::prefix("services")->name("services.")->group(function (){
                    Route::get('/', [aServicesController::class, "services_list"])->name('list');
                    Route::get('/create', [aServicesController::class, "services_create"])->name('create');
                    Route::post('/', [aServicesController::class, "services_store"])->name('store');
                    Route::get('edit/{id}', [aServicesController::class, "services_edit"])->name('edit');
                    Route::get('{id}', [aServicesController::class, "services_show"])->name('show');
                    Route::put('{id}', [aServicesController::class, "services_update"])->name('update');
                    Route::delete('{id}', [aServicesController::class, "services_destroy"])->name('destroy');
                    });

                    Route::prefix("evenements")->name("evenements.")->group(function (){
                        Route::get('/', [aEvenementsController::class, "evenements_list"])->name('list');
                        Route::get('/create', [aEvenementsController::class, "evenements_create"])->name('create');
                        Route::post('/', [aEvenementsController::class, "evenements_store"])->name('store');
                        Route::get('edit/{id}', [aEvenementsController::class, "evenements_edit"])->name('edit');
                        Route::get('{id}', [aEvenementsController::class, "evenements_show"])->name('show');
                        Route::put('{id}', [aEvenementsController::class, "evenements_update"])->name('update');
                        Route::delete('{id}', [aEvenementsController::class, "evenements_destroy"])->name('destroy');
                        });


                        Route::prefix("partenaires")->name("partenaires.")->group(function (){
                            Route::get('/', [aPartenairesController::class, "partenaires_list"])->name('list');
                            Route::get('/create', [aPartenairesController::class, "partenaires_create"])->name('create');
                            Route::post('/', [aPartenairesController::class, "partenaires_store"])->name('store');
                            Route::get('edit/{id}', [aPartenairesController::class, "partenaires_edit"])->name('edit');
                            Route::get('{id}', [aPartenairesController::class, "partenaires_show"])->name('show');
                            Route::put('{id}', [aPartenairesController::class, "partenaires_update"])->name('update');
                            Route::delete('{id}', [aPartenairesController::class, "partenaires_destroy"])->name('destroy');
                            });

                            Route::prefix("devises")->name("devises.")->group(function (){
                                Route::get('/', [aDevisesController::class, "devises_list"])->name('list');
                                Route::get('/create', [aDevisesController::class, "devises_create"])->name('create');
                                Route::post('/', [aDevisesController::class, "devises_store"])->name('store');
                                Route::get('edit/{id}', [aDevisesController::class, "devises_edit"])->name('edit');
                                Route::get('{id}', [aDevisesController::class, "devises_show"])->name('show');
                                Route::put('{id}', [aDevisesController::class, "devises_update"])->name('update');
                                Route::delete('{id}', [aDevisesController::class, "devises_destroy"])->name('destroy');
                                });

                                Route::prefix("specialites")->name("specialites.")->group(function (){
                                    Route::get('/', [aSpecialitesController::class, "specialites_list"])->name('list');
                                    Route::get('/create', [aSpecialitesController::class, "specialites_create"])->name('create');
                                    Route::post('/', [aSpecialitesController::class, "specialites_store"])->name('store');
                                    Route::get('edit/{id}', [aSpecialitesController::class, "specialites_edit"])->name('edit');
                                    Route::get('{id}', [aSpecialitesController::class, "specialites_show"])->name('show');
                                    Route::put('{id}', [aSpecialitesController::class, "specialites_update"])->name('update');
                                    Route::delete('{id}', [aSpecialitesController::class, "specialites_destroy"])->name('destroy');
                                    });
                                    
                                    Route::prefix("prerequis")->name("prerequis.")->group(function (){
                                        Route::get('/', [aPrerequisController::class, "prerequis_list"])->name('list');
                                        Route::get('/create', [aPrerequisController::class, "prerequis_create"])->name('create');
                                        Route::post('/', [aPrerequisController::class, "prerequis_store"])->name('store');
                                        Route::get('edit/{id}', [aPrerequisController::class, "prerequis_edit"])->name('edit');
                                        Route::get('{id}', [aPrerequisController::class, "prerequis_show"])->name('show');
                                        Route::put('{id}', [aPrerequisController::class, "prerequis_update"])->name('update');
                                        Route::delete('{id}', [aPrerequisController::class, "prerequis_destroy"])->name('destroy');
                                        });


                                        Route::prefix("niveaux")->name("niveaux.")->group(function (){
                                            Route::get('/', [aNiveauController::class, "niveaux_list"])->name('list');
                                            Route::get('/create', [aNiveauController::class, "niveaux_create"])->name('create');
                                            Route::post('/', [aNiveauController::class, "niveaux_store"])->name('store');
                                            Route::get('edit/{id}', [aNiveauController::class, "niveaux_edit"])->name('edit');
                                            Route::get('{id}', [aNiveauController::class, "niveaux_show"])->name('show');
                                            Route::put('{id}', [aNiveauController::class, "niveaux_update"])->name('update');
                                            Route::delete('{id}', [aNiveauController::class, "niveaux_destroy"])->name('destroy');
                                            });

                                            Route::prefix("users")->name("users.")->group(function (){
                                                Route::get('/', [aUsersController::class, "users_list"])->name('list');
                                                Route::get('/create', [aUsersController::class, "users_create"])->name('create');
                                                Route::post('/', [aUsersController::class, "users_store"])->name('store');
                                                Route::get('edit/{id}', [aUsersController::class, "users_edit"])->name('edit');
                                                Route::get('{id}', [aUsersController::class, "users_show"])->name('show');
                                                Route::put('{id}', [aUsersController::class, "users_update"])->name('update');
                                                Route::delete('{id}', [aUsersController::class, "users_destroy"])->name('destroy');
                                                });

                                                Route::prefix("categories")->name("categories.")->group(function (){
                                                    Route::get('/', [aCategoriesController::class, "categories_list"])->name('list');
                                                    Route::get('/create', [aCategoriesController::class, "categories_create"])->name('create');
                                                    Route::post('/', [aCategoriesController::class, "categories_store"])->name('store');
                                                    Route::get('edit/{id}', [aCategoriesController::class, "categories_edit"])->name('edit');
                                                    Route::get('{id}', [aCategoriesController::class, "categories_show"])->name('show');
                                                    Route::put('{id}', [aCategoriesController::class, "categories_update"])->name('update');
                                                    Route::delete('{id}', [aCategoriesController::class, "categories_destroy"])->name('destroy');
                                                    });

                                                    Route::prefix("tags")->name("tags.")->group(function (){
                                                        Route::get('/', [aTagsController::class, "tags_list"])->name('list');
                                                        Route::get('/create', [aTagsController::class, "tags_create"])->name('create');
                                                        Route::post('/', [aTagsController::class, "tags_store"])->name('store');
                                                        Route::get('edit/{id}', [aTagsController::class, "tags_edit"])->name('edit');
                                                        Route::get('{id}', [aTagsController::class, "tags_show"])->name('show');
                                                        Route::put('{id}', [aTagsController::class, "tags_update"])->name('update');
                                                        Route::delete('{id}', [aTagsController::class, "tags_destroy"])->name('destroy');
                                                        });


                                                        Route::prefix("cours")->name("cours.")->group(function (){
                                                            Route::get('/', [aCoursesController::class, "cours_list"])->name('list');
                                                            Route::get('/create', [aCoursesController::class, "cours_create"])->name('create');
                                                            Route::post('/', [aCoursesController::class, "cours_store"])->name('store');
                                                            Route::get('edit/{id}', [aCoursesController::class, "cours_edit"])->name('edit');
                                                            Route::get('{id}', [aCoursesController::class, "cours_show"])->name('show');
                                                            Route::put('{id}', [aCoursesController::class, "cours_update"])->name('update');
                                                            Route::delete('{id}', [aCoursesController::class, "cours_destroy"])->name('destroy');
                                                            });
                                                            Route::prefix("langues")->name("langues.")->group(function (){
                                                                Route::get('/', [aLanguesController::class, "langues_list"])->name('list');
                                                                Route::get('/create', [aLanguesController::class, "langues_create"])->name('create');
                                                                Route::post('/', [aLanguesController::class, "langues_store"])->name('store');
                                                                Route::get('edit/{id}', [aLanguesController::class, "langues_edit"])->name('edit');
                                                                Route::get('{id}', [aLanguesController::class, "langues_show"])->name('show');
                                                                Route::put('{id}', [aLanguesController::class, "langues_update"])->name('update');
                                                                Route::delete('{id}', [aLanguesController::class, "langues_destroy"])->name('destroy');
                                                                });

                                                                Route::prefix("bureaux")->name("bureaux.")->group(function (){
                                                                    Route::get('/', [aBureauController::class, "bureaux_list"])->name('list');
                                                                    Route::get('/create', [aBureauController::class, "bureaux_create"])->name('create');
                                                                    Route::post('/', [aBureauController::class, "bureaux_store"])->name('store');
                                                                    Route::get('edit/{id}', [aBureauController::class, "bureaux_edit"])->name('edit');
                                                                    Route::get('{id}', [aBureauController::class, "bureaux_show"])->name('show');
                                                                    Route::put('{id}', [aBureauController::class, "bureaux_update"])->name('update');
                                                                    Route::delete('{id}', [aBureauController::class, "bureaux_destroy"])->name('destroy');
                                                                    });
                            
                                                                    Route::prefix("articles")->name("articles.")->group(function (){
                                                                        Route::get('/', [aArticlesController::class, "articles_list"])->name('list');
                                                                        Route::get('/create', [aArticlesController::class, "articles_create"])->name('create');
                                                                        Route::post('/', [aArticlesController::class, "articles_store"])->name('store');
                                                                        Route::get('edit/{id}', [aArticlesController::class, "articles_edit"])->name('edit');
                                                                        Route::get('{id}', [aArticlesController::class, "articles_show"])->name('show');
                                                                        Route::put('{id}', [aArticlesController::class, "articles_update"])->name('update');
                                                                        Route::delete('{id}', [aArticlesController::class, "articles_destroy"])->name('destroy');
                                                                        });
                                                                    
                                                                        Route::resource('evenements', aEvenementsController::class);
                                                                        
                                                                        
Route::resource('icones', aIconesController::class);
Route::resource('temoignages', aTemoignagesController::class);

});

// Routes pour utilisateurs authentifiés
Route::middleware(['auth'])->group(function () {
    Route::post('/password/update', [ProfileController::class, 'update_password'])->name('password.update');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    
    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('profile.show');
    Route::put('/profile/update', [ProfileController::class, 'update_profile'])->name('profile.update');

    Route::post('/inscrire/{cours}', [CourseController::class, 'enroulement_cours'])->name('inscrire');
    Route::get('/enroulement/success', [CourseController::class, 'enroulement_success'])->name('enroulement_success');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Route::post('/lock-screen', [AuthController::class, 'lockScreen'])->name('lockScreen');
    // Route::post('/unlock-screen', [AuthController::class, 'unlockScreen'])->name('unlockScreen');

});

Route::get('/creer-lien-storage', [sSettingsController::class, 'createStorageLink']);

// Appliquer le middleware check.locked à toutes les routes du groupe
// Route::middleware(['auth', 'check.locked'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/', function () {
//         return view('v1.dashboard');
//     })->name('dashboard');
// });

// Middleware pour plusieurs rôles
// Route::middleware(['role:admin,instructor'])->group(function () {
//     Route::get('/shared/dashboard', function () {
//         return view('shared.dashboard');
//     });
// });

