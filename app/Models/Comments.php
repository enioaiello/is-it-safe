<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'id_user',
        'id_forum',
        'comment',
    ];

    public function setCommentAttribute($comment)
    {
        $this->attributes['comment'] = substr(trim($comment), 0, 250);
    }


    public function forum()
    {
        return $this->belongsTo(Forums::class, 'id_forum');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
