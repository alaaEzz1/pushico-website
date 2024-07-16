<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\OurService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //
    public function index()
    {
        $ourServices = OurService::all();
        return view('dashboard.ourservices.index', compact('ourServices'));
    }

    public function create()
    {
        return view('dashboard.ourservices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'action_url' => 'nullable|string|max:255',
        ]);

        OurService::create($validated);

        return redirect()->route('ourservices.index')->with('success', 'OurService created successfully.');
    }

    public function show(OurService $ourService)
    {
        return view('dashboard.ourservices.show', compact('ourService'));
    }

    public function edit(OurService $ourService)
    {
        return view('dashboard.ourservices.edit', compact('ourService'));
    }

    public function update(Request $request, OurService $ourService)
    {
        $validated = $request->validate([
            'image' => 'sometimes|required|string|max:255',
            'title' => 'sometimes|required|string|max:255',
            'desc' => 'sometimes|required|string',
            'action_url' => 'nullable|string|max:255',
        ]);

        $ourService->update($validated);

        return redirect()->route('ourservices.index')->with('success', 'OurService updated successfully.');
    }

    public function destroy(OurService $ourService)
    {
        $ourService->delete();
        return redirect()->route('ourservices.index')->with('success', 'OurService deleted successfully.');
    }
}
