<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class aContactsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function contacts()
    {
        $contacts = Contact::paginate(10);
        return view($this::$TEMPLATE_VESION.'.admin.list_contacts', compact('contacts'));
    }

    public function contacts_delete($id)
    {
        $contacts = Contact::findOrFail($id);
        $contacts->delete();

        return redirect()->route('admin.contacts')->with('success', 'Message supprimeravec successfully');
    }
}
