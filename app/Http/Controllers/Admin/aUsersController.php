<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Specialite;
use App\Models\Pays;
use App\Models\Ville;

class aUsersController extends Controller
{
    private static $TEMPLATE_VESION = "v1";

    public function users_list()
    {
        $users = User::paginate(4);
        return view($this::$TEMPLATE_VESION.'.admin.users.list', compact('users'));
    }

    // Show the form to create a new user
    public function users_create()
    {
        $pays = Pays::all();
        $villes = Ville::all();
        $specialites = Specialite::all();
        return view($this::$TEMPLATE_VESION.'.admin.users.create', compact('pays', 'villes', 'specialites'));
    }

    // Store a new user
    public function users_store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'telephone' => 'nullable|string',
            'date_naissance' => 'nullable|date',
            'adresse1' => 'nullable|string',
            'adresse2' => 'nullable|string',
            'pays_id' => 'exists:pays,id',
            'ville_id' => 'exists:villes,id',
            'specialite_id' => 'exists:specialites,id',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'nullable|string',
            'is_admin' => 'in:0,1',
            'is_active' => 'in:0,1',
            'is_othor' => 'in:0,1',
            'approuve_cours' => 'in:0,1',
        ]);
        
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
            $directory = 'users/';
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
        

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);
        $user->save();

        return redirect()->route('admin.users.list')->with('success', 'User created successfully');
    }

    // Show a single user
    public function users_show($id)
    {
        $user = User::findOrFail($id);
        return view($this::$TEMPLATE_VESION.'.admin.users.show', compact('user'));
    }

    // Show the form to edit a user
    public function users_edit($id)
    {
        $user = User::findOrFail($id);
        $pays = Pays::all();
        $villes = Ville::all();
        $specialites = Specialite::all();
        return view($this::$TEMPLATE_VESION.'.admin.users.edit', compact('user', 'pays', 'villes', 'specialites'));
    }

    // Update a user
    public function users_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $id,
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'telephone' => 'nullable|string',
            'date_naissance' => 'nullable|date',
            'adresse1' => 'nullable|string',
            'adresse2' => 'nullable|string',
            'pays_id' => 'exists:pays,id',
            'ville_id' => 'exists:villes,id',
            'specialite_id' => 'exists:specialites,id',
            'bio' => 'nullable|string',
            'role' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_admin' => 'in:0,1',
            'is_active' => 'in:0,1',
            'is_othor' => 'in:0,1',
            'approuve_cours' => 'in:0,1',
        ]);

        $user = User::findOrFail($id);

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
            $directory = 'users/';
            $path = public_path($directory);
        
            // Créer le dossier s'il n'existe pas
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
        
            // Supprimer l'ancienne image si existante (facultatif selon ton contexte)
            if (!empty($data['avatar']) && file_exists(public_path($data['avatar']))) {
                unlink(public_path($data['avatar']));
            }
        
            // Déplacer le fichier
            $file->move($path, $filename);
        
            // Enregistrer le chemin relatif
            $data['avatar'] = $directory . $filename;
        }
        
        
        // $validatedData['password'] = Hash::make($request->password);

        $user->update($validatedData);
        $user->save();

        return redirect()->route('admin.users.list')->with('success', 'User updated successfully');
    }

    // Delete a user
    public function users_destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.list')->with('success', 'User deleted successfully');
    }

}
