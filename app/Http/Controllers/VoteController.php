<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function vote($ideaId)
    {
        $idea = Idea::findOrFail($ideaId);
        $user = Auth::user();

        $vote = Vote::firstOrCreate([
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);

        return response()->json(['message' => 'Vote enregistré.']);
    }

    public function unvote($ideaId)
    {
        $idea = Idea::findOrFail($ideaId);
        $user = Auth::user();

        $deleted = Vote::where('user_id', $user->id)
                       ->where('idea_id', $idea->id)
                       ->delete();

        if ($deleted) {
            return response()->json(['message' => 'Vote supprimé.']);
        }

        return response()->json(['message' => 'Aucun vote à retirer.'], 404);
    }

    public function count($ideaId)
    {
        $idea = Idea::findOrFail($ideaId);
        $count = $idea->votes()->count();

        return response()->json(['votes' => $count]);
    }

    // Fonction pour les likes
    public function store($id)
    {
        $idea = Idea::findOrFail($id);
        $user = Auth::user();

        // Empêcher de liker plusieurs fois
        if (!$idea->voters->contains($user->id)) {
            $idea->voters()->attach($user->id);
        }

        return redirect()->back();
    }
}
