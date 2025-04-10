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
        ]);

        // Gérer l'attachement si présent
        // if ($request->hasFile('attachment')) {
        //     $path = $request->file('attachment')->store('attachments', 'public');
        //     $idea->attachment = $path;
        // }

        // $idea->save();


    // Tentative de gestion de l'attachement
    // try {
    //     if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
    //         // Stocker le fichier dans le dossier public/attachments
    //         $attachmentPath = $request->file('attachment')->store('attachments', 'public');
    //         // Enregistrer le chemin du fichier dans la base de données
    //         $idea->attachment = $attachmentPath;
    //     }
    // } catch (\Exception $e) {
    //     // Log l'erreur et retourne un message d'erreur
    //     \Log::error("Erreur lors de l'upload de l'attachement : " . $e->getMessage());
    //     return back()->with('error', 'Une erreur est survenue lors de l\'upload du fichier. Veuillez réessayer.');
    // }

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
        // if ($idea->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
        //     return response()->json(['message' => 'Non autorisé.'], 403);
        // }

        // $request->validate([
        //     'title' => 'sometimes|string|max:255',
        //     'description' => 'sometimes|string',
        //     'theme_id' => 'nullable|exists:themes,id',
        //     'departement_id' => 'nullable|exists:departements,id',
        //     'project_id' => 'nullable|exists:projects,id',
        // ]);

        // $idea->update($request->only(['title', 'description', 'theme_id', 'departement_id', 'project_id']));

        // return response()->json($idea);


        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'nullable|in:en_attente,en_etude,validee,rejetee,en_cours,implémentée', // Validation du statut
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

    //  public function edit(Idea $idea)
    //  {
        // if (!$idea->exists) {
        //     return redirect()->route('ideas.index')->with('error', 'Idée non trouvée');
        // }

        // dd($idea->toArray()); // Affiche l'objet Idea pour déboguer
        // $idea = Idea::findOrFail($id);


        // Charger les thèmes, départements et projets
    // $themes = Theme::all();
    // $departments = Department::all();
    // $projects = Project::all();

    // // Passer toutes ces données à la vue
    // return view('ideas.edit', [
    //     'idea' => $idea,
    //     'themes' => $themes,  // Assurez-vous que cela est passé
    //     'departments' => $departments,
    //     'projects' => $projects
    // ]);

    // $idea = Idea::find($id);
    // if (!$idea) {
    //     abort(404, "Idée non trouvée");
    // }
    // return view('ideas.edit', compact('idea'));
        //  return view('ideas.edit', compact('idea')); // Formulaire d'édition
    //  }

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
        // if ($idea->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
        //     return response()->json(['message' => 'Non autorisé.'], 403);
        // }

        $idea->delete();
        return redirect()->route('ideas.index')->with('success', 'L\'idée a été supprimée avec succès.');


    }

    /**
     * Met à jour le statut d’une idée.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:en_attente,en_etude,validee,rejetee,en_cours,implémentée',
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
