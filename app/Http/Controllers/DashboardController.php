<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $totalIdeas = Idea::count();
        // $ideasByStatus = Idea::select('status', DB::raw('count(*) as count'))->groupBy('status')->get();
        // $topIdeas = Idea::withCount('votes')->orderBy('votes_count', 'desc')->take(5)->get();
        // $totalUsers = User::count();
        // $totalComments = Comment::count();

        // $usersWithActivity = User::whereHas('ideas')->orWhereHas('votes')->distinct()->count();
        // $participationRate = round(($usersWithActivity / max($totalUsers, 1)) * 100, 2);

        // return response()->json([
        //     'total_ideas' => $totalIdeas,
        //     'ideas_by_status' => $ideasByStatus,
        //     'top_ideas' => $topIdeas,
        //     'total_users' => $totalUsers,
        //     'total_comments' => $totalComments,
        //     'participation_rate' => $participationRate . '%',
        // ]);

           // Récupérer l'utilisateur connecté
    $user = auth()->user();

    // Récupérer toutes les idées proposées par cet utilisateur
    $ideas = $user->ideas;  // Assumant qu'il y a une relation `ideas()` dans le modèle User

    return view('dashboard', compact('ideas'));
    }
}
