<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Threat_level extends Model
{
    use HasFactory;

    protected $table = 'threat_level';

    protected $fillable = [
        'name_level',
    ];

    public $timestamps = false;

}
