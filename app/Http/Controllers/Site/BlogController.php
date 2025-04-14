<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Categorie;
use App\Models\Article;

class BlogController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function blog()
    {
    $articles = Article::where('active', 1)->orderBy('created_at', 'desc')->paginate(6);

    $categories = Categorie::withCount('articles')->where('active', 1)->get();

    $articleCount = $articles->count();

    $tags = Tag::where('active', 1)->
    where('is_article', 1)->get();

    $articles_recent = Article::where('active', 1)->orderBy('created_at', 'desc')->take(3)->get();

        return view($this::$TEMPLATE_VESION.'.site.articles.blog', compact('articles', 'articleCount', 'categories', 'tags', 'articles_recent'));
    }

    public function showByTag($tagId)
{
    $tag = Tag::findOrFail($tagId); 
    $articles = $tag->articles;

    return view($this::$TEMPLATE_VESION.'.site.articles.by_tag', compact('tag', 'articles'));
}


    public function blog_details($id)
    {
        $article = Article::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.site.articles.blog-detail', compact('article'));
    }
}
