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
}
