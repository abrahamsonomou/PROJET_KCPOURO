<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class aTagsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function tags_list()
    {
        $tags = Tag::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.tags.list', compact('tags'));
    }

    // Show the form to create a new tag
    public function tags_create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.tags.create');
    }

    // Store a new tag
    public function tags_store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:tags,nom',
            'is_article' => 'required|in:0,1',
            'is_cours' => 'required|in:0,1',
            'active' => 'required|in:0,1',
        ]);

        Tag::create($request->all());

        return redirect()->route('admin.tags.list')->with('success', 'Tag created successfully');
    }

    // Show the form to edit a tag
    public function tags_edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.tags.edit', compact('tag'));
    }

    // Update the tag
    public function tags_update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|unique:tags,nom,' . $id,
            'is_article' => 'required|in:0,1',
            'is_cours' => 'required|in:0,1',
            'active' => 'required|in:0,1',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update($request->all());

        return redirect()->route('admin.tags.list')->with('success', 'Tag updated successfully');
    }

    // Delete a tag
    public function tags_destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('admin.tags.list')->with('success', 'Tag deleted successfully');
    }
}
