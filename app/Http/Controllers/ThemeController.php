<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::all();
        return view('admin.themes.index', compact('themes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $theme = Theme::create($request->all());

        // return redirect()->route('themes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        return Theme::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        $theme = Theme::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $theme->update($request->all());

        return response()->json($theme);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        $theme = Theme::findOrFail($id);
        $theme->delete();

        return response()->json(['message' => 'Thématique supprimée.']);
    }
}
