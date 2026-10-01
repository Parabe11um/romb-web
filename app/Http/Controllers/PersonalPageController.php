<?php

namespace App\Http\Controllers;

use App\Models\PersonalPage;
use Illuminate\Contracts\View\View;

class PersonalPageController extends Controller
{
    public function index(): View
    {
        $page = PersonalPage::query()->whereKey(1)->where('is_published', true)->firstOrFail();

        return view('personal.index', [
            'page' => $page,
            'skills' => $page->visibleItems('skills'),
            'experience' => $page->visibleItems('experience'),
            'projects' => $page->visibleItems('projects'),
        ]);
    }
}
