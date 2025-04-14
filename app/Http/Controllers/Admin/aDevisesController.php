<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Devise;
use Illuminate\Support\Facades\Storage;

class aDevisesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function devises_list()
    {
        $devises = Devise::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.devises.list', compact('devises'));
    }

    // Show the form to create a new Devise
    public function devises_create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.devises.create');
    }

    // Store a new Devise
    public function devises_store(Request $request)
    {
        $request->validate([
            'code_iso' => 'string|unique:devises,code_iso',
            'symbole' => 'string',
            'nom' => 'string',
            'nom_court' => 'string',
            'active' => 'in:0,1',
        ]);

        Devise::create($request->all());

        return redirect()->route('admin.devises.list')->with('success', 'Devise created successfully');
    }

    // Show a single Devise
    public function devises_show($id)
    {
        $devise = Devise::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.devises.show', compact('devise'));
    }

    // Show the form to edit a Devise
    public function devises_edit($id)
    {
        $devise = Devise::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.devises.edit', compact('devise'));
    }

    // Update the Devise
    public function devises_update(Request $request, $id)
    {
        $request->validate([
            'code_iso' => 'sometimes|required|string|unique:devises,code_iso,' . $id,
            'symbole' => 'sometimes|required|string',
            'nom' => 'sometimes|required|string',
            'nom_court' => 'sometimes|required|string',
            'active' => 'required|in:0,1',
        ]);

        $devise = Devise::findOrFail($id);
        $devise->update($request->all());

        return redirect()->route('admin.devises.list')->with('success', 'Devise updated successfully');
    }

    // Delete a Devise
    public function devises_destroy($id)
    {
        $devise = Devise::findOrFail($id);
        $devise->delete();

        return redirect()->route('admin.devises.list')->with('success', 'Devise deleted successfully');
    }
}
