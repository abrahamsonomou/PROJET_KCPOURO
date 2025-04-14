<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class aServicesController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function services_list()
    {
        $services = Service::paginate(5);
        return view($this::$TEMPLATE_VESION.'.admin.services.list', compact('services'));
    }

    //

    // Show the form to create a new prerequi
    public function services_create()
    {
        return view($this::$TEMPLATE_VESION.'.admin.services.create');
    }

    // Store a new prerequi
    public function services_store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|unique:services,titre',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ordre' => 'nullable|integer',
            'active' => 'required|in:0,1',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.list')->with('success', 'prerequi created successfully');
    }

    // Show the form to edit a prerequi
    public function services_edit($id)
    {
        $service = Service::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.services.edit', compact('service'));
    }

    // Update the prerequi
    public function services_update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'sometimes|required|string|unique:services,titre,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ordre' => 'nullable|integer',
            'active' => 'required|in:0,1',
        ]);

        $service = Service::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.list')->with('success', 'prerequi updated successfully');
    }

    public function services_show($id)
    {
        $service = Service::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.services.show', compact('service'));
    }

    // Delete a prerequi
    public function services_destroy($id)
    {
        $service = Service::findOrFail($id);
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();


        return redirect()->route('admin.services.list')->with('success', 'services deleted successfully');
    }
}
