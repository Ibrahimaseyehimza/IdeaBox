<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Project;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Récupération des statistiques
        $totalIdeas = Idea::count();
        $totalProjects = Project::count();
        $totalThemes = Theme::count();
        $ideasInProgress = Idea::where('status', 'en_etude')->count();
        $ideasValidated = Idea::where('status', 'validee')->count();
        $implementedIdeas = Idea::where('status', 'mise_en_oeuvre')->count();
        $rejectedIdeas = Idea::where('status', 'rejete')->count();


            // Ajout pour le taux de participation
    $totalUsers = User::count(); // ou uniquement les utilisateurs actifs
    $usersWithIdeas = Idea::select('user_id')->distinct()->count();

    $participationRate = $totalUsers > 0 ? round(($usersWithIdeas / $totalUsers) * 100, 2) : 0;

        // Passer les données à la vue
        return view('admin.dashboard', compact(
            'totalIdeas',
            'participationRate',
            'totalProjects',
            'totalThemes',
            'ideasInProgress',
            'ideasValidated',
            'implementedIdeas',
            'rejectedIdeas'
        ));
    }

            public function updateStatus(Request $request, Idea $idea)
            {
                $request->validate([
                    'status' => ['required', 'in:en_etude,validee,mise_en_oeuvre,rejete'],
                ]);

                $idea->status = $request->status;
                $idea->save();

                $user = $idea->user; // relation user dans le modèle Idea
                if ($user) {
                    $user->notify(new \App\Notifications\IdeaStatusUpdated($idea));
                }


                return back()->with('success', 'Statut de l’idée mis à jour avec succès.');
            }

}
