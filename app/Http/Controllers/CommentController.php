<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CommentController handles the CRUD operations for comments on ideas.
 */
class CommentController extends Controller
{
    public function index($ideaId)
    {
        $idea = Idea::findOrFail($ideaId);
        return response()->json($idea->comments()->with('user')->latest()->get());
    }


    public function store(Request $request, Idea $idea)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $idea->comments()->create([
            'user_id' => auth()->id(),
            'idea_id' => $idea->id,
            'body' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté !');
    }

    // Fonction pour voir les commentaires
        public function show($id)
        {
            $idea = Idea::with('comments.user')->findOrFail($id);  // Charger l'idée avec ses commentaires et les utilisateurs associés
            return view('ideas.show', compact('idea'));
        }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['message' => 'Commentaire supprimé.']);
    }
}
