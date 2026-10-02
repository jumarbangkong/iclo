<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of public articles.
     */
    public function index(Request $request)
    {
        $query = Article::with('author')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc');

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $query->whereHas('category', function($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $articles = $query->paginate(6)->withQueryString();

        return view('articles.index', compact('articles'));
    }

    /**
     * Display the specified article.
     */
    public function show($slug)
    {
        $article = Article::with('author')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Get some other related articles for recommendations
        $relatedArticles = Article::where('id', '!=', $article->id)
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
   
}


