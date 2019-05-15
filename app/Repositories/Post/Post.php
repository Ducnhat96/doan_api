<?php

namespace App\Repositories\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'user_id','title','content'
    ];
    public function user()
    {
        return $this->belongsTo(\App\User::class,'user_id');
    }
}
