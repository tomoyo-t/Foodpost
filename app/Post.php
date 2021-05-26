<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['photo', 'country_id','store_information','comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}