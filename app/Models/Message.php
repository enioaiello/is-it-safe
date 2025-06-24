<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'message';

    protected $fillable = [
        'id_user',
        'title',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
