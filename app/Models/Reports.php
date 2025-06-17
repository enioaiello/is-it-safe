<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Reports extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'id_user',
        'id_type',
        'id_threat_level',
        'description',
    ];
}
