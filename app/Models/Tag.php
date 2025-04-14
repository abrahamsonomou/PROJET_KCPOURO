<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'is_article',
        'is_cours',
        'active',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'tags_articles');
    }

    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'tags_cours');
    }
}
