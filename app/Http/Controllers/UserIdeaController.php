<?php

namespace App\Http\Controllers;
use App\Models\Theme;

use Illuminate\Http\Request;

class UserIdeaController extends Controller
{
    // Affiche le dashboard de l'utilisateur avec le formulaire de soumission d'idée
    public function index()
    {
        // On récupère tous les thèmes pour le select
        $themes = Theme::all();
        return view('user.dashboard', compact('themes'));
    }

    // Enregistre une nouvelle idée
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'theme_id' => 'required|exists:themes,id',
        ]);

        // Enregistrement de l'idée
        $idea = new Idea();
        $idea->title = $request->title;
        $idea->description = $request->description;
        $idea->theme_id = $request->theme_id;
        $idea->user_id = auth()->id(); // L'utilisateur connecté
        $idea->status = 'en_cours'; // Par défaut, l'idée est en cours
        $idea->save();

        // Retourner à l'index avec un message de succès
        return redirect()->route('user.dashboard')->with('success', 'Votre idée a été soumise avec succès!');
    }
}
