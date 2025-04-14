<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Niveau;

class aNiveauController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function niveaux_list()
    {
        $niveaux = Niveau::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.niveaux.list', compact('niveaux'));
    }

    //

    // Show the form to create a new Niveau
    public function niveaux_create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.niveaux.create');
    }

    // Store a new Niveau
    public function niveaux_store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:niveaux,nom',
            'active' => 'required|in:0,1',
        ]);

        Niveau::create($request->all());

        return redirect()->route('admin.niveaux.list')->with('success', 'Niveau created successfully');
    }

    // Show the form to edit a Niveau
    public function niveaux_edit($id)
    {
        $niveau = Niveau::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.niveaux.edit', compact('niveau'));
    }

    // Update the Niveau
    public function niveaux_update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'sometimes|required|string|unique:niveaux,nom,' . $id,
            'active' => 'required|in:0,1',
        ]);

        $niveau = Niveau::findOrFail($id);
        $niveau->update($request->all());

        return redirect()->route('admin.niveaux.list')->with('success', 'Niveau updated successfully');
    }

    public function niveaux_show($id)
    {
        $niveau = Niveau::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.niveaux.show', compact('niveau'));
    }

    // Delete a Niveau
    public function niveaux_destroy($id)
    {
        $niveau = Niveau::findOrFail($id);
        $niveau->delete();

        return redirect()->route('admin.niveaux.list')->with('success', 'Niveau deleted successfully');
    }

}
