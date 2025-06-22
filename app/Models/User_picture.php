<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class User_picture extends Model
{
     use HasFactory;

    protected $table = 'user_picture';

    protected $fillable = [
        'picture_url',
    ];

    public $timestamps = false;

}
