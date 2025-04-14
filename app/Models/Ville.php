<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = ['pays_id', 'nom', 'active'];

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id');
    }
}
