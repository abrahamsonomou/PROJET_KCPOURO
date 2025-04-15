<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parametre;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Specialite;
use App\Models\Pays;
use App\Models\Ville;
use Illuminate\Support\Facades\Artisan;

class aSettingsController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function settings(Request $request)
{

    $user = Auth::user();

    $pays = Pays::where('active', 1)->get();
    $villes = Ville::where('active', 1)->get();
    $specialites = Specialite::where('active', 1)->get();

    $parametre = Parametre::firstOrCreate([]);

    if ($request->isMethod('post')) {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'telephone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'email2' => 'nullable|email|max:255',
            'copyright' => 'nullable|string|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'facebook_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'youtube_link' => 'nullable|url|max:255',

            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:512',
            'logo_footer' => 'nullable|image|max:2048',
            'default_avatar_user' => 'nullable|image|max:2048',
            'default_avatar_student' => 'nullable|image|max:2048',
            'default_avatar_instructor' => 'nullable|image|max:2048',
        ]);

        $fieldsToUpdate = $request->only([
            'site_name', 'description', 'telephone', 'email', 'email2', 'copyright',
            'twitter_link', 'facebook_link', 'instagram_link', 'linkedin_link', 'youtube_link'
        ]);

        // Handling file uploads
        $imageFields = ['logo', 'favicon', 'logo_footer', 'default_avatar_user', 'default_avatar_student', 'default_avatar_instructor'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
        
                if (!$file->isValid()) {
                    return response()->json([
                        'error' => "Le fichier uploadé pour le champ $field est invalide."
                    ], 422);
                }
        
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . $field . '.' . $extension;
        
                // Définir le chemin relatif
                $directory = 'settings/images/';
                $path = public_path($directory);
        
                // Créer le dossier s'il n'existe pas
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
        
                // Supprimer l'ancien fichier s'il existe
                if (!empty($parametre->$field) && file_exists(public_path($parametre->$field))) {
                    unlink(public_path($parametre->$field));
                }
        
                // Déplacer le nouveau fichier
                $file->move($path, $filename);
        
                // Stocker le chemin relatif
                $fieldsToUpdate[$field] = $directory . $filename;
            }
        }
        

        $parametre->update($fieldsToUpdate);

        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    }

    return view($this::$TEMPLATE_VESION.'.admin.settings', compact('parametre','user','pays', 'villes', 'specialites'));
}

public function createStorageLink()
{
    Artisan::call('storage:link');

    return response()->json(['message' => 'Lien symbolique créé avec succès.']);
}


}
