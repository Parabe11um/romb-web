<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('services')
            ->where('is_active', true)
            ->latest()
            ->get();

        $services = Service::where('is_active', true)->get();

        return view('projects.index', compact('projects', 'services'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('projects.show', compact('project'));
    }
}
