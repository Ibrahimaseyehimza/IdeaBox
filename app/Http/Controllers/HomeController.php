<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Méthode pour afficher la page d'accueil
    public function index()
    {
        // Récupérer toutes les idées de la base de données
        // $ideas = Idea::all();

        // Retourner la vue welcome avec les idées
        // return view('welcome', compact('ideas'));


        // Idées populaires (par votes et commentaires)
        $popularIdeas = Idea::with(['user'])
        ->withCount(['votes', 'comments'])
        ->orderByDesc('votes_count')
        ->orderByDesc('comments_count')
        ->take(5) // Top 5 idées populaires
        ->get();

    // Toutes les idées récentes (si tu veux afficher en dessous)
    $ideas = Idea::latest()->with('user')->paginate(10);

    return view('welcome', compact('popularIdeas', 'ideas'));
        // return view('welcome', compact('ideas'));
    }
}
