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
        $ideas = Idea::all();

        // Retourner la vue welcome avec les idées
        return view('welcome', compact('ideas'));
    }
}
