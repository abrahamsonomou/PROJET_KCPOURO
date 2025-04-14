<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prerequis;

class aPrerequisController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function prerequis_list()
        {
            $prerequis = Prerequis::paginate(5);
            return view($this::$TEMPLATE_VESION.'.admin.prerequis.list', compact('prerequis'));
        }
    
        //
    
        // Show the form to create a new prerequi
        public function prerequis_create()
        {
            return view($this::$TEMPLATE_VESION.'.admin.prerequis.create');
        }
    
        // Store a new prerequi
        public function prerequis_store(Request $request)
        {
            $request->validate([
                'nom' => 'required|string|unique:prerequis,nom',
                'active' => 'required|in:0,1',
            ]);
    
            Prerequis::create($request->all());
    
            return redirect()->route('admin.prerequis.list')->with('success', 'prerequi created successfully');
        }
    
        // Show the form to edit a prerequi
        public function prerequis_edit($id)
        {
            $item = Prerequis::findOrFail($id);
            return view($this::$TEMPLATE_VESION.'.admin.prerequis.edit', compact('item'));
        }
    
        // Update the prerequi
        public function prerequis_update(Request $request, $id)
        {
            $request->validate([
                'nom' => 'sometimes|required|string|unique:prerequis,nom,' . $id,
                'active' => 'required|in:0,1',
            ]);
    
            $prerequi = Prerequis::findOrFail($id);
            $prerequi->update($request->all());
    
            return redirect()->route('admin.prerequis.list')->with('success', 'prerequi updated successfully');
        }
    
        public function prerequis_show($id)
        {
            $item = Prerequis::findOrFail($id);
            return view($this::$TEMPLATE_VESION.'.admin.prerequis.show', compact('item'));
        }
    
        // Delete a prerequi
        public function prerequis_destroy($id)
        {
            $prerequi = Prerequis::findOrFail($id);
            $prerequi->delete();
    
            return redirect()->route('admin.prerequis.list')->with('success', 'prerequis deleted successfully');
        }
}
