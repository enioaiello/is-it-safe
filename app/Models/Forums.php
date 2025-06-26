<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Forums extends Model
{
    use HasFactory;

    protected $table = 'forums';

    protected $fillable = [
        'id_user',
        'title',
        'description',
    ];

    public function setTitleAttribute($value)
    {
        // Met la première lettre de chaque mot en majuscule et supprime les espaces en trop
        $this->attributes['title'] = ucwords(strtolower(trim($value)));
    }

    public function setDescriptionAttribute($value)
    {
        // Supprime les espaces inutiles et limite à 500 caractères max
        $this->attributes['description'] = substr(trim($value), 0, 500);
    }


    public function comments()
    {
        return $this->hasMany(Comments::class, 'id_forum');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
