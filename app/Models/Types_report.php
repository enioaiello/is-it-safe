<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Types_report extends Model
{
    use HasFactory;

    protected $table = 'types_report';

    protected $fillable = [
        'name_type',
    ];

    public $timestamps = false;

}
