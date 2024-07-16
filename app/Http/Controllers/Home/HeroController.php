<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    //
    public function index()
    {
        $heros = Hero::all();
        return view('dashboard.heros.index', compact('heros'));
    }

    public function create()
    {
        return view('dashboard.heros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'action_link' => 'nullable|string|max:255',
        ]);

        Hero::create($validated);

        return redirect()->route('heros.index')->with('success', 'Hero created successfully.');
    }

    public function show(Hero $hero)
    {
        return view('dashboard.heros.show', compact('hero'));
    }

    public function edit(Hero $hero)
    {
        return view('dashboard.heros.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $validated = $request->validate([
            'image' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'subtitle' => 'sometimes|required|string|max:255',
            'action_link' => 'nullable|string|max:255',
        ]);

        $hero->update($validated);

        return redirect()->route('heros.index')->with('success', 'Hero updated successfully.');
    }

    public function destroy(Hero $hero)
    {
        $hero->delete();
        return redirect()->route('heros.index')->with('success', 'Hero deleted successfully.');
    }
}
