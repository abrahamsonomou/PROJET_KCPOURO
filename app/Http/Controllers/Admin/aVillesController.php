<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Pays;

class aVillesController extends Controller
{
    private static $TEMPLATE_VERSION = "v1";

    public function index()
    {
        $villes = Ville::with('pays')->get();
        return view(self::$TEMPLATE_VERSION.'.admin.villes.index', compact('villes'));
    }

    public function create()
    {
        $pays = Pays::all();
        return view(self::$TEMPLATE_VERSION.'.admin.villes.create', compact('pays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pays_id' => 'required|exists:pays,id',
            'nom' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        Ville::create($request->all());

        return redirect()->route('admin.villes.index')->with('success', 'Ville ajoutée avec succès.');
    }

    public function edit($id)
    {
        $ville = Ville::findOrFail($id);
        $pays = Pays::all();
        return view(self::$TEMPLATE_VERSION.'.admin.villes.edit', compact('ville', 'pays'));
    }

    public function update(Request $request, $id)
    {
        $ville = Ville::findOrFail($id);

        $request->validate([
            'pays_id' => 'required|exists:pays,id',
            'nom' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        $ville->update($request->all());

        return redirect()->route('admin.villes.index')->with('success', 'Ville modifiée avec succès.');
    }

    public function destroy($id)
    {
        Ville::destroy($id);
        return redirect()->route('admin.villes.index')->with('success', 'Ville supprimée avec succès.');
    }
}