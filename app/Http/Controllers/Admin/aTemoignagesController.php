<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Temoignage;
use Illuminate\Http\Request;

class aTemoignagesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function index()
    {
        $temoignages = Temoignage::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.temoignages.list', compact('temoignages'));
    }

    public function create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.temoignages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'image' => 'nullable|image',
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null;

        Temoignage::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'specialite' => $request->specialite,
            'image' => $imagePath,
            'ordre' => $request->ordre ?? 0,
            'active' => $request->active ?? 1,
        ]);

        return redirect()->route('admin.temoignages.index');
    }

    public function edit(Temoignage $temoignage)
    {
        return view($this::$TEMPLATE_VESION.'.admin.temoignages.edit', compact('temoignage'));
    }

    public function update(Request $request, Temoignage $temoignage)
    {
        $request->validate([
            'titre' => 'required',
            'image' => 'nullable|image',
        ]);

        $imagePath = $temoignage->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $temoignage->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'specialite' => $request->specialite,
            'image' => $imagePath,
            'ordre' => $request->ordre ?? 0,
            'active' => $request->active ?? 1,
        ]);

        return redirect()->route('admin.temoignages.index');
    }

    public function destroy(Temoignage $temoignage)
    {
        $temoignage->delete();
        return redirect()->route('admin.temoignages.index');
    }
}
