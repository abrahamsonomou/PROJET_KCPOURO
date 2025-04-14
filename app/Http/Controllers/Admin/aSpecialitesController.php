<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialite;

class aSpecialitesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function specialites_list()
    {
        $specialites = Specialite::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.specialites.list', compact('specialites'));
    }

    //

    // Show the form to create a new specialite
    public function specialites_create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.specialites.create');
    }

    // Store a new specialite
    public function specialites_store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:specialites,nom',
            'description' => 'nullable|string',
            'active' => 'required|in:0,1',
        ]);

        Specialite::create($request->all());

        return redirect()->route('admin.specialites.list')->with('success', 'specialite created successfully');
    }

    // Show the form to edit a specialite
    public function specialites_edit($id)
    {
        $specialite = Specialite::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.specialites.edit', compact('specialite'));
    }

    // Update the Specialite
    public function specialites_update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'sometimes|required|string|unique:specialites,nom,' . $id,
            'active' => 'required|in:0,1',
            'description' => 'nullable|string',
        ]);

        $specialite = Specialite::findOrFail($id);
        $specialite->update($request->all());

        return redirect()->route('admin.specialites.list')->with('success', 'specialite updated successfully');
    }

    public function specialites_show($id)
    {
        $specialite = Specialite::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.specialites.show', compact('specialite'));
    }

    // Delete a specialite
    public function specialites_destroy($id)
    {
        $specialite = Specialite::findOrFail($id);
        $specialite->delete();

        return redirect()->route('admin.specialites.list')->with('success', 'Specialite deleted successfully');
    }

}
