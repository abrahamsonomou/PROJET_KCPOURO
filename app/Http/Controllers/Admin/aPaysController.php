<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pays;

class aPaysController extends Controller
{
    private static $TEMPLATE_VESION = "v1";
   
    public function pays_list()
    {
        $pays = Pays::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.pays.list', compact('pays'));
    }

    // Show the form to create a new Pays
    public function pays_create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.pays.create');
    }

    // Store a new Pays
    public function pays_store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:pays,nom',
            'code_iso' => 'nullable|string',
            'indicatif' => 'nullable|string',
            'nationnalite' => 'nullable|string',
            'active' => 'required|in:0,1',
        ]);

        Pays::create($request->all());

        return redirect()->route('admin.pays.list')->with('success', 'Pays created successfully');
    }

    // Show a single Pays
    public function pays_show($id)
    {
        $pays = Pays::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.pays.show', compact('pays'));
    }

    // Show the form to edit a Pays
    public function pays_edit($id)
    {
        $pays = Pays::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.pays.edit', compact('pays'));
    }

    // Update the Pays
    public function pays_update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'sometimes|required|string|unique:pays,nom'. $id,
            'code_iso' => 'sometimes|nullable|string',
            'indicatif' => 'sometimes|nullable|string',
            'nationnalite' => 'sometimes|nullable|string',
            'active' => 'required|in:0,1',
        ]);

        $pays = Pays::findOrFail($id);
        $pays->update($request->all());

        return redirect()->route('admin.pays.list')->with('success', 'Pays updated successfully');
    }

    // Delete a Pays
    public function pays_destroy($id)
    {
        $pays = Pays::findOrFail($id);
        $pays->delete();

        return redirect()->route('admin.pays.list')->with('success', 'Pays deleted successfully');
    }
}
