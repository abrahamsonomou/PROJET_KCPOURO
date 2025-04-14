<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollementCours extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cours_id', 'date_enrolemment', 'active'];

    
}
