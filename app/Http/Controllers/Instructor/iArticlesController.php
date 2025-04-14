<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class iArticlesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function my_articles()
    {
        // Get the articles created by the authenticated user
         $articles = Article::where('user_id', auth()->id())->get();
         $categories = Categorie::where('active', 1)->
         where('is_article', 1)->get();

        return view($this::$TEMPLATE_VESION.'.instructors.my_articles', compact('articles', 'categories'));
    }

    public function create_articles()
    {
        $categories = Categorie::where('active', 1)->
        where('is_article', 1)->get();
        return view($this::$TEMPLATE_VESION.'.instructors.create_articles', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'active' => 'required|boolean',
        ]);
    
        $data = $request->except('image');
        $data['user_id'] = Auth::id(); // 👈 Récupération de l’utilisateur connecté
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid().'_'.time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/articles', $filename);
            $data['image'] = $filename;
        }
    
        Article::create($data);
    
        return redirect()->route('instructors.my_articles')->with('success', 'Article ajouté avec succès.');
    }

public function edit(Article $article)
{
    $categories = Categorie::all();
    return view('articles.edit', compact('article', 'categories'));
}

public function update(Request $request, Article $article)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required',
        'categorie_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048',
        'active' => 'required|boolean',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = uniqid().'_'.time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/articles', $filename);
        $data['image'] = $filename;
    }

    $article->update($data);

    return redirect()->route('articles.index')->with('success', 'Article mis à jour.');
}

public function destroy(Article $article)
{
    $article->delete();
    return redirect()->route('articles.index')->with('success', 'Article supprimé.');
}

}
