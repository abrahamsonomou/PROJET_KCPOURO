<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrerequisCours extends Model
{
    use HasFactory;

    protected $fillable = ['prerequis_id', 'cours_id'];

}
