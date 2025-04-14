<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Specialite;
use App\Models\Pays;
use App\Models\Ville;

class ProfileController extends Controller
{
    private static $TEMPLATE_VESION = "v1";
   
    public function show_profile()
    {
        $user = Auth::user();

        $pays = Pays::where('active', 1)->get();
        $villes = Ville::where('active', 1)->get();
        $specialites = Specialite::where('active', 1)->get();

        if ($user->hasRole('admin')) {
            return view($this::$TEMPLATE_VESION.'.admin.settings', compact('user','pays', 'villes', 'specialites'));
        } elseif ($user->hasRole('student')) {
            return view($this::$TEMPLATE_VESION.'.students.settings', compact('user','pays', 'villes', 'specialites'));
        } elseif ($user->hasRole('instructor')) {
            return view($this::$TEMPLATE_VESION.'.instructors.settings', compact('user','pays', 'villes', 'specialites'));
        } 
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $pays = Pays::where('active', 1)->get();
        $villes = Ville::where('active', 1)->get();
        $specialites = Specialite::where('active', 1)->get();
    
        if ($request->isMethod('put')) {
    
            $request->validate([
                'name' => 'nullable|string|max:255',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'first_name' => 'nullable|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'telephone' => 'nullable|string',
                'date_naissance' => 'nullable|date',
                'adresse1' => 'nullable|string',
                'adresse2' => 'nullable|string',
                'pays_id' => 'nullable|exists:pays,id',
                'ville_id' => 'nullable|exists:villes,id',
                'specialite_id' => 'nullable|exists:specialites,id',
                'bio' => 'nullable|string',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $validatedData = $request->except('avatar');
    
            if ($request->hasFile('avatar')) {
                $fileExtension = $request->file('avatar')->getClientOriginalExtension();
                $fileName = pathinfo($request->file('avatar')->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $fileName.'_'.uniqid().'_'.time().'.'.$fileExtension;
                $request->file('avatar')->storeAs('public/users/avatar', $fileName);
                $validatedData['avatar'] = $fileName;
            }
    
            try {
                $user->update($validatedData);
    
                session()->flash('swal_success', 'Profile updated successfully.');
                if ($user->hasRole('admin')) {
                    return view($this::$TEMPLATE_VESION.'.admin.settings', compact('user','pays', 'villes', 'specialites'));
                } elseif ($user->hasRole('student')) {
                    return view($this::$TEMPLATE_VESION.'.students.settings', compact('user','pays', 'villes', 'specialites'));
                } elseif ($user->hasRole('instructor')) {
                    return view($this::$TEMPLATE_VESION.'.instructors.settings', compact('user','pays', 'villes', 'specialites'));
                } 
            } catch (\Exception $e) {
                session()->flash('swal_error', 'Something went wrong while updating the profile.');
            }
        }
    
        if ($user->hasRole('admin')) {
            return view($this::$TEMPLATE_VESION.'.admin.settings', compact('user','pays', 'villes', 'specialites'));
        } elseif ($user->hasRole('student')) {
            return view($this::$TEMPLATE_VESION.'.students.settings', compact('user','pays', 'villes', 'specialites'));
        } elseif ($user->hasRole('instructor')) {
            return view($this::$TEMPLATE_VESION.'.instructors.settings', compact('user','pays', 'villes', 'specialites'));
        } 
    }
    

    public function update_password(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        // Utiliser une clé spécifique pour SweetAlert
        return back()->with('swal_error', 'Current password is incorrect.');
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    $successMessage = 'Password updated successfully.';

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.settings')->with('swal_success', $successMessage);
    } elseif ($user->hasRole('student')) {
        return redirect()->route('students.settings')->with('swal_success', $successMessage);
    } elseif ($user->hasRole('instructor')) {
        return redirect()->route('instructors.settings')->with('swal_success', $successMessage);
    }
}


}
