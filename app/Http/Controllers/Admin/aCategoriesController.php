<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Icone;

class aCategoriesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function categories_list()
    {
        $categories = Categorie::paginate(5);

        return view($this::$TEMPLATE_VESION.'.admin.categories.list', compact('categories'));
    }

    public function categories_create()
    {
        $icones = Icone::all();

        return view($this::$TEMPLATE_VESION.'.admin.categories.create', compact('icones'));
    }

    public function categories_store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|unique:categories,nom',
        'icon' => 'string|nullable',
        'is_article' => 'required|in:0,1',
        'is_cours' => 'required|in:0,1',
        'active' => 'required|in:0,1',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048', // validate the image
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = null; // if no image is uploaded, set it to null
    }

    // Create category
    Categorie::create([
        'nom' => $request->nom,
        'icon' => $request->icon,
        'is_article' => $request->is_article,
        'is_cours' => $request->is_cours,
        'active' => $request->active,
        'image' => $imagePath, // store the image path
    ]);

    return redirect()->route('admin.categories.list')->with('success', 'Categorie created successfully');
}

public function categories_edit($id)
{
    $icones = Icone::all();
    $categorie = Categorie::findOrFail($id);
    return view($this::$TEMPLATE_VESION.'.admin.categories.edit', compact('categorie','icones'));
}

public function categories_update(Request $request, $id)
{
    $request->validate([
        'nom' => 'sometimes|required|string|unique:categories,code,' . $id,
        'icon' => 'string|nullable',
        'is_article' => 'required|in:0,1',
        'is_cours' => 'required|in:0,1',
        'active' => 'required|in:0,1',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // validate the image
    ]);

    $categorie = Categorie::findOrFail($id);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($categorie->image && Storage::exists('public/' . $categorie->image)) {
            Storage::delete('public/' . $categorie->image);
        }

        $imagePath = $request->file('image')->store('images', 'public');
        $categorie->image = $imagePath;
    }

    // Update category
    $categorie->update([
        'nom' => $request->nom,
        'icon' => $request->icon,
        'is_article' => $request->is_article,
        'is_cours' => $request->is_cours,
        'active' => $request->active,
        // If image was uploaded, update it
        'image' => $categorie->image ?? $categorie->image,
    ]);

    return redirect()->route('admin.categories.list')->with('success', 'Categorie updated successfully');
}

public function categories_destroy($id)
{
    $categorie = Categorie::findOrFail($id);

    // Delete the image from storage if it exists
    if ($categorie->image && Storage::exists('public/' . $categorie->image)) {
        Storage::delete('public/' . $categorie->image);
    }

    $categorie->delete();

    return redirect()->route('admin.categories.list')->with('success', 'Categorie deleted successfully');
}
}
