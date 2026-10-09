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
            
        $activities = \App\Models\Activity::orderBy('date', 'desc')->take(6)->get();
            
        return view('home', compact('articles', 'activities'));
    }

    public function activities()
    {
        $activities = \App\Models\Activity::with('images')->orderBy('date', 'desc')->paginate(12);
        return view('activities.index', compact('activities'));
    }

    public function activity($slug)
    {
        // Try finding by slug first, if not found try by ID
        $activity = \App\Models\Activity::with('images')->where('slug', $slug)->first();
        if (!$activity) {
            $activity = \App\Models\Activity::with('images')->findOrFail($slug);
        }
        
        $relatedActivities = \App\Models\Activity::where('id', '!=', $activity->id)
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();
            
        return view('activities.show', compact('activity', 'relatedActivities'));
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
