<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inscription;
use App\Models\Cours;

class CourseController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function cours()
    {
        $cours = Cours::where('active', 1)->where('etat', 1)->orderBy('created_at', 'desc')->with('user')->paginate(2);
        return view($this::$TEMPLATE_VESION.'.site.cours.allcourse', compact('cours'));
    }

    public function cours_details($id)
    {
        // Récupérer les détails du cours
        $cours = Cours::findOrFail($id);
    
        // Récupérer les cours en relation
        $cours_en_relation = $cours->coursEnRelation(); 

        // Retourner la vue avec les détails du cours et les cours en relation
        return view($this::$TEMPLATE_VESION.'.site.cours.details', compact('cours', 'cours_en_relation'));
    }
    
    public function enroulement_cours($coursId)
    {
        $user = Auth::user();

        // Vérifier si l'utilisateur est déjà inscrit
        if (Inscription::where('user_id', $user->id)->where('cours_id', $coursId)->exists()) {
            return redirect()->back()->with('error', 'Vous êtes déjà inscrit à ce cours.');
        }

        // Inscrire l'utilisateur
        Inscription::create([
            'user_id' => $user->id,
            'cours_id' => $coursId
        ]);

        $cours = Cours::findOrFail($coursId);
        return redirect()->back()->with('success', 'Vous êtes inscrit à ce cours.');
    }

    public function enroulement_success()
    {
        return view($this::$TEMPLATE_VESION.'.site.enroulement-success');
    }
}
