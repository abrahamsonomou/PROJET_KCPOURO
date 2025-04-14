<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Bureau;

class ContactController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function contact()
    {

        $bureaux = Bureau::where('active', 1)->take(4)->get();
        return view($this::$TEMPLATE_VESION.'.site.contact', compact('bureaux'));
    }

    public function store_contact(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'sujet' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        // return redirect()->route('contact_success')->with('success', 'Message envoyé avec succès !');
        return redirect()->back()->with('success', 'Message envoyé avec succès !');
    }

    public function contact_success()
    {
        return view($this::$TEMPLATE_VESION.'.site.contact-success');
    }
}
