<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bureau;

class aBureauController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function bureaux_list()
    {
        $bureaux = Bureau::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.bureaux.list', compact('bureaux'));
    }

    //

    // Show the form to create a new bureaux
    public function bureaux_create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.bureaux.create');
    }

    // Store a new bureaux
    public function bureaux_store(Request $request)
    {
        $request->validate([
            'ville' => 'required|string',
            'adresse' => 'required|string',
            'email' => 'required|string',
            'telephone' => 'required|string',
            'active' => 'required|in:0,1',
        ]);

        Bureau::create($request->all());

        return redirect()->route('admin.bureaux.list')->with('success', 'bureaux created successfully');
    }

    // Show the form to edit a bureaux
    public function bureaux_edit($id)
    {
        $bureaux = Bureau::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.bureaux.edit', compact('bureaux'));
    }

    // Update the bureaux
    public function bureaux_update(Request $request, $id)
    {
        $request->validate([
            'ville' => 'required|string',
            'adresse' => 'required|string',
            'email' => 'required|string',
            'telephone' => 'required|string',
            'active' => 'required|in:0,1',
        ]);

        $bureaux = Bureau::findOrFail($id);
        $bureaux->update($request->all());

        return redirect()->route('admin.bureaux.list')->with('success', 'bureaux updated successfully');
    }

    public function bureaux_show($id)
    {
        $bureaux = Bureau::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.bureaux.show', compact('bureaux'));
    }

    // Delete a bureaux
    public function bureaux_destroy($id)
    {
        $bureaux = Bureau::findOrFail($id);
        $bureaux->delete();

        return redirect()->route('admin.bureaux.list')->with('success', 'bureaux deleted successfully');
    }

}
