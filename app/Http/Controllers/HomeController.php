<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->get();

        $projects = Project::where('is_active', true)
            ->latest()
            ->limit(3)
            ->get();

        $articles = Article::where('is_active', true)
            ->latest()
            ->limit(3)
            ->get();

        return view('home', compact('services', 'projects', 'articles'));
    }
}
