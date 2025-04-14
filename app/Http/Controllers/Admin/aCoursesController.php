<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Tag;
use App\Models\Cours;
use App\Models\Langue;
use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Devise;
use App\Models\User;
use App\Models\Prerequis;

class aCoursesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function cours_categorie()
    {
        return view($this::$TEMPLATE_VESION.'.admin.cours_categorie');
    }

    public function details_cours()
    {
        return view($this::$TEMPLATE_VESION.'.admin.details_cours');
    }

    public function cours_list()
    {
        // Retrieve all courses
        // $cours = Cours::all();
    
            // Fetch courses with pagination (10 per page)
        $cours = Cours::paginate(5); 

        // Count the total number of courses
        $totalCours = Cours::count();

        // Count the number of activated courses (etat = 1)
        $activatedCours = Cours::where('etat', 1)->count();

        // Count the number of pending courses (etat = 0)
        $pendingCours = Cours::where('etat', 0)->count();
    
        // Count the number of rejected courses (etat = 2)
        $rejectedCours = Cours::where('etat', 2)->count();

        // Pass the courses and counts to the view
        return view($this::$TEMPLATE_VESION.'.admin.cours.list', compact('cours', 'totalCours', 'activatedCours', 'pendingCours', 'rejectedCours'));
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            // If there's a query, search for courses
            $courses = Cours::where('titre', 'like', '%' . $query . '%')
                            ->orWhere('description', 'like', '%' . $query . '%')
                            ->get();
        } else {
            // If there's no query, return all courses
            $courses = Cours::all();
        }
    
        return response()->json($courses);
    }
    

    public function cours_create()
    {
        $categories = Categorie::where('active', 1)->
        where('is_cours', 1)->get();
        $niveaux = Niveau::where('active', 1)->get();
        $langues = Langue::where('active', 1)->get();
        $devises = Devise::where('active', 1)->get();
        $instructors = User::where('is_active', 1)->where('role', 'instructor')->get();

        $tags = Tag::where('active', 1)->
        where('is_cours', 1)->get();
        $prerequis = Prerequis::where('active', 1)->get(); // Get all prerequis
        return view($this::$TEMPLATE_VESION.'.admin.cours.create', compact('categories', 'niveaux', 'tags', 'prerequis', 'langues', 'devises', 'instructors'));
    }

    // Store a new course
    public function cours_store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'categorie_id' => 'exists:categories,id',
            'niveau_id' => 'exists:niveaux,id',
            'langue_id' => 'exists:langues,id',
            'devise_id' => 'exists:devises,id',
            'prix' => 'nullable|numeric',
            'prix_promo' => 'nullable|numeric',
            'taux_reduction' => 'nullable|string|max:100',
            'duree' => 'nullable|string',
            'nombre_lesson' => 'nullable|integer',
            'certificat' => 'required|in:0,1',
            'nombre_quizz' => 'nullable|integer',
            'objectifs' => 'nullable|string',
            'image' => 'nullable|image',
            'url_video' => 'nullable|url',
            'user_id' => 'exists:users,id',
            'active' => 'required|in:0,1',
            'etat' => 'required|in:0,1,2',
            'top' => 'nullable|in:0,1',
            
            'tags' => 'nullable|array', // Validate tags as an array
            'tags.*' => 'exists:tags,id', // Validate each tag ID

            'prerequis' => 'nullable|array', // Validate prerequis as an array
            'prerequis.*' => 'exists:prerequis,id', // Validate each prerequis ID
        ]);

        // Store image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/cours', 'public');
        }

        $cours = Cours::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'categorie_id' => $request->categorie_id,
            'niveau_id' => $request->niveau_id,
            'langue_id' => $request->langue_id,
            'devise_id' => $request->devise_id,
            'prix' => $request->prix,
            'prix_promo' => $request->prix_promo,
            'top' => $request->top,
            'taux_reduction' => $request->taux_reduction,
            'duree' => $request->duree,
            'nombre_lesson' => $request->nombre_lesson,
            'certificat' => $request->certificat,
            'nombre_quizz' => $request->nombre_quizz,
            'objectifs' => $request->objectifs,
            'image' => $imagePath,
            'url_video' => $request->url_video,
            'user_id' => $request->user_id,
            'active' => $request->active,
            'etat' => $request->etat,
        ]);

        // Attach selected tags to the course
        if ($request->has('tags')) {
            $cours->tags()->attach($request->tags);
        }

        if ($request->has('prerequis')) {
            $cours->prerequis()->attach($request->prerequis);
        }

        return redirect()->route('admin.cours.list')->with('success', 'Course created successfully');
    }

    // Show the form to edit a course
    public function cours_edit($id)
    {
        $cours = Cours::findOrFail($id); // Trouver le cours par ID
        $categories = Categorie::where('active', 1)->
        where('is_cours', 1)->get();
        $instructors = User::where('role', 'instructor')->get(); // Filtrer les instructeurs
        $devises = Devise::all();
        $langues = Langue::all();
        $niveaux = Niveau::all();
        $tags = Tag::where('active', 1)->
        where('is_cours', 1)->get();
        $prerequis = Prerequis::where('active', 1)->get(); // Get all prerequis

        return view($this::$TEMPLATE_VESION.'.admin.cours.edit', compact('cours', 'categories', 'instructors', 'devises', 'prerequis', 'langues', 'niveaux', 'tags'));
    }

    // Update the course
    public function cours_update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'categorie_id' => 'nullable|exists:categories,id',
            'niveau_id' => 'nullable|exists:niveaux,id',
            'langue_id' => 'nullable|exists:langues,id',
            'devise_id' => 'nullable|exists:devises,id',
            'prix' => 'nullable|numeric|min:0',
            'prix_promo' => 'nullable|numeric|min:0',
            'taux_reduction' => 'nullable|numeric|min:0|max:100',
            'duree' => 'nullable|string',
            'nombre_lesson' => 'nullable|integer|min:0',
            'certificat' => 'nullable|boolean',
            'nombre_quizz' => 'nullable|integer|min:0',
            'objectifs' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Limite de 2MB
            'url_video' => 'nullable|url',
            'user_id' => 'required|exists:users,id',
            'active' => 'nullable|boolean',
            'top' => 'nullable|boolean',
            'etat' => 'nullable|in:0,1,2',
    
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
    
            'prerequis' => 'nullable|array',
            'prerequis.*' => 'exists:prerequis,id',
        ]);
    
        // Trouver le cours ou échouer
        $cours = Cours::findOrFail($id);
    
        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($cours->image) {
                Storage::disk('public')->delete($cours->image);
            }
    
            // Enregistrer la nouvelle image
            $imagePath = $request->file('image')->store('images/cours', 'public');
            $cours->image = $imagePath;
        }
    
        // Mise à jour des champs du cours
        $cours->update($request->only([
            'titre', 'description', 'short_description', 'categorie_id', 'niveau_id', 
            'langue_id', 'devise_id', 'prix', 'prix_promo', 'taux_reduction', 'duree', 
            'nombre_lesson', 'certificat', 'nombre_quizz', 'objectifs', 'url_video', 
            'user_id', 'active', 'top', 'etat'
        ]));
    
        // Mise à jour des tags et prérequis
        $cours->tags()->sync($request->tags ?? []);
        $cours->prerequis()->sync($request->prerequis ?? []);
    
        // Redirection avec message de succès
        return redirect()->route('admin.cours.list')->with('success', 'Course updated successfully');
    }

    public function approveCourse($id, Request $request)
    {
        $cours = Cours::findOrFail($id);

        // Valider le commentaire si fourni
        $request->validate([
            'commentaire' => 'nullable|string|max:255',
        ]);

        $cours->etat = 1; // Approuver le cours
        $cours->commentaire = $request->input('commentaire') ?? 'Approved'; // Ajouter le commentaire
        $cours->save();

        return redirect()->route('admin.cours.list')->with('success', 'Course approved successfully');
    }

    public function rejectCourse($id, Request $request)
    {
        $cours = Cours::findOrFail($id);

        // Valider le commentaire si fourni
        $request->validate([
            'commentaire' => 'nullable|string|max:255',
        ]);

        $cours->etat = 2; // Rejeter le cours
        $cours->commentaire = $request->input('commentaire') ?? 'Rejected'; // Ajouter le commentaire
        $cours->save();

        return redirect()->route('admin.cours.list')->with('success', 'Course rejected successfully');
    }

    public function toggleCourseStatus($id)
    {
        $cours = Cours::findOrFail($id);

        // Activer ou désactiver le cours
        if ($cours->active == 0) {
            $cours->active = 1; // Activer
        } else {
            $cours->active = 0; // Désactiver
        }

        $cours->save();

        return redirect()->route('admin.cours.list')->with('success', 'Course has been successfully');
    }

    public function cours_show($id)
    {
        $cours = Cours::findOrFail($id);

        return view($this::$TEMPLATE_VESION.'.admin.cours.show', compact('cours'));
    }

    // Delete a course
    public function cours_destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();

        return redirect()->route('admin.cours.list')->with('success', 'Course deleted successfully');
    }

    public function enroulements()
    {
        $enroulements = Inscription::all();

        return view($this::$TEMPLATE_VESION.'.admin.cours.enroulements', compact('enroulements'));
    }

    public function toggleenroulementstatus($id)
    {
        $enroulement = Inscription::findOrFail($id);

        // Activer ou désactiver le enroulement
        if ($enroulement->active == 0) {
            $enroulement->active = 1; // Activer
        } else {
            $enroulement->active = 0; // Désactiver
        }

        $enroulement->save();

        return redirect()->route('admin.cours.enroulements')->with('success', 'enroulement has been successfully');
    }
	
	    public function approveenroulement($id, Request $request)
    {
        $enroulement = Inscription::findOrFail($id);


        $enroulement->etat = 1;
        $enroulement->save();

        return redirect()->route('admin.cours.enroulements')->with('success', 'enroulement approved successfully');
    }

}
