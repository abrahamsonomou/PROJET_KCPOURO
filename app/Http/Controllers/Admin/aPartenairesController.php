<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partenaire;
use Illuminate\Support\Facades\Storage;

class aPartenairesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function partenaires_list()
                {
                    $partenaires = Partenaire::paginate(5);
                    return view($this::$TEMPLATE_VESION.'.admin.partenaires.list', compact('partenaires'));
                }

                // Show the form to create a new prerequi
                public function partenaires_create()
                {
                    return view($this::$TEMPLATE_VESION.'.admin.partenaires.create');
                }
            
                // Store a new prerequi
                public function partenaires_store(Request $request)
                {
                    $request->validate([
                        'nom' => 'required|string|unique:partenaires,nom',
                        'description' => 'nullable|string',
                        'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'ordre' => 'nullable|integer',
                        'active' => 'required|in:0,1',
                    ]);
            
                    $data = $request->all();
    
                    if ($request->hasFile('logo')) {
                        $data['logo'] = $request->file('logo')->store('partenaires', 'public');
                    }
            
                    Partenaire::create($data);
            
                    return redirect()->route('admin.partenaires.list')->with('success', 'prerequi created successfully');
                }
            
                // Show the form to edit a prerequi
                public function partenaires_edit($id)
                {
                    $partenaire = Partenaire::findOrFail($id);
                    return view($this::$TEMPLATE_VESION.'.admin.partenaires.edit', compact('partenaire'));
                }
            
                // Update the prerequi
                public function partenaires_update(Request $request, $id)
                {
                    $request->validate([
                        'nom' => 'sometimes|required|string|unique:partenaires,nom,' . $id,
                        'description' => 'nullable|string',
                        'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'ordre' => 'nullable|integer',
                        'active' => 'required|in:0,1',
                    ]);
            
                    $partenaire = Partenaire::findOrFail($id);
                    $data = $request->all();
            
                    if ($request->hasFile('logo')) {
                        // Delete old logo
                        if ($partenaire->logo) {
                            Storage::disk('public')->delete($partenaire->logo);
                        }
                        $data['logo'] = $request->file('logo')->store('partenaires', 'public');
                    }
            
                    $partenaire->update($data);
            
                    return redirect()->route('admin.partenaires.list')->with('success', 'prerequi updated successfully');
                }
            
                public function partenaires_show($id)
                {
                    $partenaire = Partenaire::findOrFail($id);
                    return view($this::$TEMPLATE_VESION.'.admin.partenaires.show', compact('partenaire'));
                }
            
                // Delete a prerequi
                public function partenaires_destroy($id)
                {
                    $partenaire = Partenaire::findOrFail($id);
                    if ($partenaire->logo) {
                        Storage::disk('public')->delete($partenaire->logo);
                    }
                    $partenaire->delete();
            
            
                    return redirect()->route('admin.partenaires.list')->with('success', 'partenaires deleted successfully');
                }

}
