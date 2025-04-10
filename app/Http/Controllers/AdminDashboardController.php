<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Project;
use App\Models\Theme;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Récupération des statistiques
        $totalIdeas = Idea::count();
        $totalProjects = Project::count();
        $totalThemes = Theme::count();
        $ideasInProgress = Idea::where('status', 'en_cours')->count();
        $ideasValidated = Idea::where('status', 'validee')->count();

        // Passer les données à la vue
        return view('admin.dashboard', compact('totalIdeas', 'totalProjects', 'totalThemes', 'ideasInProgress', 'ideasValidated'));
    }
}
