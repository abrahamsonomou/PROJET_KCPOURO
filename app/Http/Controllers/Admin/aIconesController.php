<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Icone;

class aIconesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function index()
    {
        $icones = Icone::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.icones.index', compact('icones'));
    }

    public function create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.icones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        Icone::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'active' => $request->active ?? 1,
        ]);
        session()->flash('success', 'Icone '.$request->nom .' ajoutée avec sucess.');
        return redirect()->route('admin.icones.index');
    }

    public function edit(Icone $icone)
    {
        return view($this::$TEMPLATE_VESION.'.admin.icones.edit', compact('icone'));
    }

    public function update(Request $request, Icone $icone)
    {
        $request->validate([
            'nom' => 'required',
        ]);

        $icone->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'active' => $request->active ?? 1,
        ]);
        session()->flash('success', 'Mise à jour effetuée avec sucess.');

        return redirect()->route('admin.icones.index');
    }

    public function destroy(Icone $icone)
    {
        $icone->delete();
        session()->flash('success', 'Icone supprimée avec sucess.');

        return redirect()->route('admin.icones.index');
    }
}

