<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Resource;
use App\Models\ResourceCategory;
use App\Models\Sector;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $articles = Article::with('category')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
        return view('home', compact('articles'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function sectors()
    {
        return view('sectors');
    }

    public function resources()
    {
        $resources = Resource::with('category')->orderBy('created_at', 'desc')->paginate(12);
        $categories = ResourceCategory::orderBy('name', 'asc')->get();
        return view('resources', compact('resources', 'categories'));
    }

    public function lsp()
    {
        return view('lsp');
    }

    public function contact()
    {
        $sectors = Sector::orderBy('name_id', 'asc')->get();
        return view('contact', compact('sectors'));
    }

    public function expert($slug)
    {
        $viewName = 'experts.' . $slug;
        if (view()->exists($viewName)) {
            return view($viewName);
        }
        abort(404);
    }
}
