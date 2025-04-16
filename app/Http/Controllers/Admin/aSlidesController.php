<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage;

class aSlidesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function slides_list()
    {
        $slides = Slide::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.slides.list', compact('slides'));
    }

    //

    // Show the form to create a new prerequi
    public function slides_create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.slides.create');
    }

    // Store a new prerequi
    public function slides_store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|unique:slides,titre',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ordre' => 'nullable|integer',
            'active' => 'required|in:0,1',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
        
            if (!$file->isValid()) {
                return response()->json([
                    'error' => 'Le fichier uploadé est invalide.'
                ], 422);
            }
        
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
        
            // Dossier de destination
            $directory = 'slides/';
            $path = public_path($directory);
        
            // Créer le dossier s'il n'existe pas
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
        
            // Supprimer l'ancienne image si existante (facultatif selon ton contexte)
            if (!empty($data['image']) && file_exists(public_path($data['image']))) {
                unlink(public_path($data['image']));
            }
        
            // Déplacer le fichier
            $file->move($path, $filename);
        
            // Enregistrer le chemin relatif
            $data['image'] = $directory . $filename;
        }
        

        Slide::create($data);

        return redirect()->route('admin.slides.list')->with('success', 'prerequi created successfully');
    }

    // Show the form to edit a prerequi
    public function slides_edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.slides.edit', compact('slide'));
    }

    // Update the prerequi
    public function slides_update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'sometimes|required|string|unique:slides,titre,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ordre' => 'nullable|integer',
            'active' => 'required|in:0,1',
        ]);

        $slide = Slide::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
        
            if (!$file->isValid()) {
                return response()->json([
                    'error' => 'Le fichier uploadé est invalide.'
                ], 422);
            }
        
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
        
            // Définir le dossier de destination
            $directory = 'slides/';
            $path = public_path($directory);
        
            // Créer le dossier s’il n’existe pas
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
        
            // Supprimer l'ancienne image si elle existe
            if (!empty($slide->image) && file_exists(public_path($slide->image))) {
                unlink(public_path($slide->image));
            }
        
            // Déplacer le fichier
            $file->move($path, $filename);
        
            // Stocker le chemin relatif
            $data['image'] = $directory . $filename;
        }

        $slide->update($data);

        return redirect()->route('admin.slides.list')->with('success', 'prerequi updated successfully');
    }

    public function slides_show($id)
    {
        $slide = Slide::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.slides.show', compact('slide'));
    }

    // Delete a prerequi
    public function slides_destroy($id)
    {
        $slide = Slide::findOrFail($id);
        if ($slide->image) {
            Storage::disk('public')->delete($slide->image);
        }
        $slide->delete();


        return redirect()->route('admin.slides.list')->with('success', 'slides deleted successfully');
    }
}
