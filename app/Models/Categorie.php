<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['nom','icon', 'image', 'is_article', 'is_cours', 'active'];

    
    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    public function articles()
{
    return $this->hasMany(Article::class);
}
}
