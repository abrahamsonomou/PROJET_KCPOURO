<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $table = 'inscriptions';

    protected $fillable = [
        'user_id',
        'cours_id',
        'etat',
        'active',
        'taux_progression',
        'date_inscription'
    ];

    /**
     * Relation avec l'utilisateur (étudiant)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation avec le cours
     */
    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
}
