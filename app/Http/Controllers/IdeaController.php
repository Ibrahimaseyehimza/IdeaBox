<?php

namespace App\Http\Controllers;

use \App\Models\Department;
use \App\Models\Project;
use \App\Models\Theme;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Affiche la liste des idées.
     */
    public function index()
    {
        $ideas = Idea::latest()->paginate(10); // Pagination de 10 par page
        return view('ideas.index', compact('ideas'));
    }

    public function create()
    {
        // return view('ideas.create'); // Formulaire de création d'idée
        $themes = Theme::all();
        $departments = Department::all();
        $projects = Project::all(); // Si nécessaire

        // return view('ideas.create', compact('themes', 'departments', 'projects'));

        return view('ideas.create', [
            'themes' => $themes,
            'departments' => $departments, // ou 'departments' selon votre vue
            'projects' => $projects
        ]);
    }

    /**
     * Stocke une nouvelle idée.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'theme_id' => 'nullable|exists:themes,id',
            'department_id' => 'nullable|exists:departments,id',
            'project_id' => 'nullable|exists:projects,id',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validation pour les fichiers
        ]);

        $idea = Idea::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'theme_id' => $request->theme_id,
            'department_id' => $request->department_id,
            'project_id' => $request->project_id,
            'is_anonymous' => $request->has('is_anonymous') ? 1 : 0, // Vérifie si la case est cochée
        ]);

            // Gérer l'attachement si présent
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
            $idea->attachment = $attachmentPath;
            $idea->save();

         // Sauvegarder l'idée dans la base de données
        $idea->save();


        return redirect()->route('ideas.index')->with('success', 'L\'idée a été créée avec succès !');

    }

    /**
     * Affiche une idée spécifique avec ses relations.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea')); // Afficher une idée
    }

    /**
     * Met à jour une idée.
     */
    public function update(Request $request, Idea $idea)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            // 'status' => 'nullable|in:en_attente,en_etude,validee,rejetee,en_cours,implémentée', // Validation du statut
            'status' => 'nullable|in:en_etude,validee,mise_en_oeuvre,rejete', // Validation du statut
        ]);

        $idea->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status, // Si le statut est envoyé et validé
        ]);

        return redirect()->route('ideas.index')->with('success', 'L\'idée a été mise à jour avec succès !');
    }

    /**
     * Modifier une idée.
     */


    public function edit($id) {
        // dd("on est bien dans edit avec l'idée #$id");
        $idea = Idea::find($id);

        if (!$idea) {
            abort(404);
        }

        $themes = Theme::all(); // Assurez-vous que cette ligne existe
        $projects = Project::all();
        $departments = Department::all();

        return view('ideas.edit', compact('idea', 'themes', 'projects', 'departments'));

    }


    /**
     * Supprime une idée.
     */
    public function destroy(Idea $idea)
    {

        $idea->delete();
        return redirect()->route('ideas.index')->with('success', 'L\'idée a été supprimée avec succès.');


    }

    /**
     * Met à jour le statut d’une idée.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:en_etude,validee,mise_en_oeuvre,rejete',
        ]);

        $idea = Idea::findOrFail($id);

        $idea->status = $request->status;
        $idea->save();

        return redirect()->route('ideas.index');
    }

    // Fonction pour afficher les idées de l'utilisateur connecté
    public function mine()
    {
        // Récupérer les idées de l'utilisateur connecté
        $user = Auth::user();
        $ideas = $user->ideas;  // En supposant que l'utilisateur a une relation 'ideas' définie dans le modèle User

        return view('ideas.mine', compact('ideas'));  // Assure-toi d'avoir une vue 'ideas.mine'
    }

    // Fonction pour les likee
        public function like($id)
    {
        $idea = Idea::findOrFail($id);
        $idea->likes += 1;
        $idea->save();

        return redirect()->back();
    }
}
