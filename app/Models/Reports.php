<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Reports extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'website_name',
        'id_user',
        'id_type',
        'id_status',
        'id_threat_level',
        'description',
    ];
}
