<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Categorie;

class iCoursesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function my_cours()
    {
        $course = Cours::where('user_id', auth()->id())->where('active', 1)->paginate(1);
        $categories = Categorie::where('active', 1)->
        where('is_article', 1)->get();
        return view($this::$TEMPLATE_VESION.'.instructors.my_cours', compact('course', 'categories'));
    }

    public function create_cours()
    {
        return view($this::$TEMPLATE_VESION.'.instructors.create_cours');
    }


}
