<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Status_report extends Model
{
    use HasFactory;

    protected $table = 'status_reports';

    protected $fillable = [
        'name_status',
    ];

    public $timestamps = false;

}
