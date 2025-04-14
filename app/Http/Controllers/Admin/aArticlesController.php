<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Tag;
use App\Models\Article;
use App\Models\User;

class aArticlesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function articles_list()
    {
        $articles = Article::paginate(5);

           // Count the articles created by the authenticated user
        $articleCount = $articles->count();

        return view($this::$TEMPLATE_VESION.'.admin.articles.list', compact('articles', 'articleCount'));
    }

    // public function articles_create()
    // {
    //     $categories = Categorie::where('active', 1)->
    //                             where('is_article', 1)->get();
    //     $auteurs = User::where('is_othor', 1)->
    //                     where('is_active', 1)->get();
    //     $tags = Tag::where('active', 1)->
    //                     where('is_article', 1)->get();
    //     return view($this::$TEMPLATE_VESION.'.admin.articles.create', compact('categories', 'tags', 'auteurs'));
    
    // }

    public function articles_create()
{
    try {
        $categories = Categorie::where('active', 1)->where('is_article', 1)->get();
        $auteurs = User::where('is_othor', 1)->where('is_active', 1)->get();
        $tags = Tag::where('active', 1)->where('is_article', 1)->get();

        // Message de succès fictif pour test
        session()->flash('success', 'Formulaire prêt pour la création d’un article.');

        return view($this::$TEMPLATE_VESION . '.admin.articles.create', compact('categories', 'tags', 'auteurs'));

    } catch (\Exception $e) {
        // Message d’erreur en cas d’échec
        session()->flash('error', 'Une erreur est survenue : ' . $e->getMessage());
        return redirect()->back();
    }
}


    // Store a new article
    public function articles_store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image',
            'active' => 'in:0,1',
            'etat' => 'in:0,1,2',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Validate that each tag ID exists
        ]);

        // Store image and article data
        $imagePath = $request->file('image') ? $request->file('image')->store('images/articles', 'public') : null;

        $article = Article::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'user_id' => $request->user_id,
            'image' => $imagePath,
            'active' => $request->active,
            'etat' => $request->etat,
        ]);

        // Attach selected tags to the article
        if ($request->has('tags')) {
            $article->tags()->attach($request->tags);
        }

        session()->flash('success', 'Article créé avec succès !');
        return redirect()->route('admin.articles.list')->with('success', 'article created successfully');
    }

    // Show the form to edit a article
    public function articles_edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Categorie::where('active', 1)->
                 where('is_article', 1)->get();
        $auteurs = User::where('is_othor', 1)->
                 where('is_active', 1)->get();
        $tags = Tag::where('active', 1)->
             where('is_article', 1)->get();
        return view($this::$TEMPLATE_VESION.'.admin.articles.edit', compact('article', 'categories', 'tags', 'auteurs'));
    }

    // Update the article
    public function articles_update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:1024',
            'active' => 'required|boolean',
            'etat' => 'in:0,1,2',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id', // Validate that each tag ID exists
        ]);
    
        // Update the article's details
        $article->titre = $request->titre;
        $article->description = $request->description;
        $article->categorie_id = $request->categorie_id;
        $article->active = $request->active;
        $article->user_id = $request->user_id;

        // Handle image upload (if a new image is provided)
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($article->image) {
                \Storage::delete('public/' . $article->image);
            }
            // Store the new image
            $imagePath = $request->file('image')->store('articles', 'public');
            $article->image = $imagePath;
        }
    
        $article->save(); // Save the updated article
        
        // Sync selected tags (add new ones and remove the removed ones)
        if ($request->has('tags')) {
            $article->tags()->sync($request->tags);
        }

        return redirect()->route('admin.articles.list')->with('success', 'article updated successfully');
    }

    // Delete a article
    public function articles_destroy($id)
    {
        $articles = Article::findOrFail($id);
        $articles->delete();

        return redirect()->route('admin.articles.list')->with('success', 'article deleted successfully');
    }

    public function articles_show($id)
    {
        $article = Article::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.articles.show', compact('article'));
    }

    public function approvearticle($id, Request $request)
    {
        $articles = Article::findOrFail($id);

        // Valider le commentaire si fourni
        $request->validate([
            'commentaire' => 'nullable|string|max:255',
        ]);

        $articles->etat = 1; // Approuver le articles
        $articles->commentaire = $request->input('commentaire') ?? 'Approved'; // Ajouter le commentaire
        $articles->save();

        return redirect()->route('admin.articles.list')->with('success', 'article approved successfully');
    }

    public function rejectarticle($id, Request $request)
    {
        $articles = Article::findOrFail($id);

        // Valider le commentaire si fourni
        $request->validate([
            'commentaire' => 'nullable|string|max:255',
        ]);

        $articles->etat = 2; // Rejeter le articles
        $articles->commentaire = $request->input('commentaire') ?? 'Rejected'; // Ajouter le commentaire
        $articles->save();

        return redirect()->route('admin.articles.list')->with('success', 'article rejected successfully');
    }

    public function togglearticleStatus($id)
    {
        $articles = Article::findOrFail($id);

        // Activer ou désactiver le articles
        if ($articles->active == 0) {
            $articles->active = 1; // Activer
        } else {
            $articles->active = 0; // Désactiver
        }

        $articles->save();

        return redirect()->route('admin.articles.list')->with('success', 'article has been successfully');
    }
    
}
