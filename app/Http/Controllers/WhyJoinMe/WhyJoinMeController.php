<?php

namespace App\Http\Controllers\WhyJoinMe;

use App\Http\Controllers\Controller;
use App\Models\WhyJoinMe;
use Illuminate\Http\Request;

class WhyJoinMeController extends Controller
{
    //
    public function index()
    {
        $whyJoinMes = WhyJoinMe::all();
        return view('dashboard.whyjoinme.index', compact('whyJoinMes'));
    }

    public function create()
    {
        return view('dashboard.whyjoinme.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
        ]);

        WhyJoinMe::create($validated);

        return redirect()->route('whyjoinme.index')->with('success', 'WhyJoinMe created successfully.');
    }

    public function show(WhyJoinMe $whyJoinMe)
    {
        return view('dashboard.whyjoinme.show', compact('whyJoinMe'));
    }

    public function edit(WhyJoinMe $whyJoinMe)
    {
        return view('dashboard.whyjoinme.edit', compact('whyJoinMe'));
    }

    public function update(Request $request, WhyJoinMe $whyJoinMe)
    {
        $validated = $request->validate([
            'icon' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'short_desc' => 'sometimes|required|string',
        ]);

        $whyJoinMe->update($validated);

        return redirect()->route('whyjoinme.index')->with('success', 'WhyJoinMe updated successfully.');
    }

    public function destroy(WhyJoinMe $whyJoinMe)
    {
        $whyJoinMe->delete();
        return redirect()->route('whyjoinme.index')->with('success', 'WhyJoinMe deleted successfully.');
    }
}
