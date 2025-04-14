<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Langue;
use Illuminate\Support\Facades\Storage;

class aLanguesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function langues_list()
    {
        $langues = Langue::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.langues.list', compact('langues'));
    }

    //

    // Show the form to create a new Langue
    public function langues_create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.langues.create');
    }

    // Store a new Langue
    public function langues_store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:langues,nom',
            'code' => 'required|string|unique:langues,code',
            'is_cours' => 'required|in:0,1',
            'active' => 'required|in:0,1',
        ]);

        Langue::create($request->all());

        return redirect()->route('admin.langues.list')->with('success', 'Langue created successfully');
    }

    // Show the form to edit a Langue
    public function langues_edit($id)
    {
        $langue = Langue::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.langues.edit', compact('langue'));
    }

    // Update the langue
    public function langues_update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'sometimes|required|string|unique:langues,nom,' . $id,
            'code' => 'required|string|unique:langues,code',
            'is_cours' => 'required|in:0,1',
            'active' => 'sometimes|boolean',
        ]);

        $langue = langue::findOrFail($id);
        $langue->update($request->all());

        return redirect()->route('admin.langues.list')->with('success', 'langue updated successfully');
    }

    public function langues_show($id)
    {
        $langue = langue::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.langues.show', compact('langue'));
    }

    // Delete a langue
    public function langues_destroy($id)
    {
        $langue = langue::findOrFail($id);
        $langue->delete();

        return redirect()->route('admin.langues.list')->with('success', 'langue deleted successfully');
    }

}
