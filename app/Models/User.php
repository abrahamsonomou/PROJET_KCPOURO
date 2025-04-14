<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'name', 'email', 'avatar', 'role', 'is_admin', 'is_active', 'is_othor', 'approuve_cours', 
        'premiere_connexion', 'first_name', 'last_name', 'telephone', 'date_naissance', 'adresse1', 
        'adresse2', 'specialite_id', 'pays_id', 'ville_id', 'bio', 'twitter_link', 'facebook_link', 
        'instagram_link', 'linkedln_link', 'youtube_link', 'email_verified_at', 'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'is_admin' => 'boolean',
    ];

    public function hasRole($role)
    {
        return $this->role === $role; // Assurez-vous que vous avez un champ `role` dans votre base de données
    }

    public function isActive()
    {
        return $this->is_active;
    }
    
    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id');
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'specialite_id');
    }

    
}
