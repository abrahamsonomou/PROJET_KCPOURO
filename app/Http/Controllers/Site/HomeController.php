<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Cours;
use App\Models\Article;
use App\Models\Temoignage;
use App\Models\Evenement;

class HomeController extends Controller
{
    private static $TEMPLATE_VESION = "v1";
    
    public function home()
    {

        $cours_populaire = Cours::where('active', 1)
                      ->where('populaire', 1)  
                      ->where('etat', 1)
                      ->with('user')      
                      ->take(12)   
                      ->get();
        $cours_top = Cours::where('active', 1)
                      ->where('top', 1)  
                      ->where('etat', 1)
                      ->with('user')      
                      ->take(2)   
                      ->get();

        $nos_slides = Slide::where('active', 1)->orderBy('ordre', 'asc')->get();
        $nos_events = Evenement::where('active', 'on')->orderBy('date', 'asc')->get();
        $nos_temoignages = Temoignage::where('active', 'on')->orderBy('ordre', 'asc')->get();
        return view($this::$TEMPLATE_VESION.'.site.home', compact('cours_top', 'nos_events','nos_temoignages', 'cours_populaire', 'nos_slides'));
    }

    
}
