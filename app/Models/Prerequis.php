<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prerequis extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'active'];

    
    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'prerequis_cours');
    }
}
