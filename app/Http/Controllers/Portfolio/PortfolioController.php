<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //
    public function index()
    {
        $portfolios = Portfolio::with('images')->get();
        return view('dashboard.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('dashboard.portfolios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
        ]);

        $portfolio = Portfolio::create($validated);

        if ($request->has('images')) {
            foreach ($request->images as $image) {
                $portfolio->images()->create(['image_path' => $image]);
            }
        }

        return redirect()->route('portfolios.index')->with('success', 'Portfolio created successfully.');
    }

    public function show(Portfolio $portfolio)
    {
        return view('dashboard.portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        return view('dashboard.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'thumbnail' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
        ]);

        $portfolio->update($validated);

        if ($request->has('images')) {
            $portfolio->images()->delete();
            foreach ($request->images as $image) {
                $portfolio->images()->create(['image_path' => $image]);
            }
        }

        return redirect()->route('portfolios.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolios.index')->with('success', 'Portfolio deleted successfully.');
    }
}
