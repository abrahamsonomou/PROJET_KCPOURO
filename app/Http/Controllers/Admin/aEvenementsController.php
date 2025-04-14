<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Evenement;

class aEvenementsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function index()
    {
        $evenements = Evenement::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.evenements.index', compact('evenements'));
    }

    public function create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.evenements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'date' => 'nullable|date',
            'lieu' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $imagePath = NULL;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Evenement::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'date' => $request->date,
            'lieu' => $request->lieu,
            'image' => $imagePath,
            'active' => $request->active ?? 1,
        ]);

        return redirect()->route('admin.evenements.index');
    }

    public function edit(Evenement $evenement)
    {
        return view($this::$TEMPLATE_VESION.'.admin.evenements.edit', compact('evenement'));
    }

    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'titre' => 'required',
            'date' => 'nullable|date',
            'lieu' => 'nullable',
            'image' => 'nullable|image',
        ]);

        
        $imagePath = $evenement->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $evenement->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'date' => $request->date,
            'lieu' => $request->lieu,
            'image' => $imagePath,
            'active' => $request->active ?? 1,
        ]);

        return redirect()->route('admin.evenements.index');
    }

    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('admin.evenements.index');
    }
}
