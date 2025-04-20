<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dishes = Dish::all();
        
        // Als de route 'menu' is, gebruik dan de menu view
        if ($request->route()->getName() === 'menu') {
            return view('menu', compact('dishes'));
        }
        
        // Anders gebruik de admin dishes view
        return view('dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Handle checkbox value explicitly
        $validated['is_available'] = $request->has('is_available');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('dishes', 'public');
            $validated['image'] = $path;
        }

        Dish::create($validated);

        return redirect()->route('dishes.index')->with('success', 'Gerecht succesvol toegevoegd!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        return view('dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['is_available'] = $request->has('is_available');

        if ($request->hasFile('image')) {
            // Delete old image if it exists and is not null
            if ($dish->image) {
                Storage::disk('public')->delete($dish->image);
            }
            $path = $request->file('image')->store('dishes', 'public');
            $validated['image'] = $path;
        } elseif (!$request->filled('keep_image')) {
             // If no new image and not keeping the old one, remove it
            if ($dish->image) {
                Storage::disk('public')->delete($dish->image);
                $validated['image'] = null;
            }
        }

        $dish->update($validated);

        return redirect()->route('dishes.index')->with('success', 'Gerecht succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        // Delete image if it exists
        if ($dish->image) {
            Storage::disk('public')->delete($dish->image);
        }
        $dish->delete();

        return redirect()->route('dishes.index')->with('success', 'Gerecht succesvol verwijderd!');
    }
} 