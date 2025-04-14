<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 
        'description', 
        'categorie_id', 
        'user_id', 
        'image', 
        'active', 
        'etat',
        'commentaire',
        'date_creation',
        'image2',
    ];

    // Many-to-many relationship with Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_articles');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
