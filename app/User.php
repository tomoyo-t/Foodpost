<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('posts', 'likes');
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    
    public function likes() {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimestamps();
    }

    public function like($id)
    {
        $exist = $this->is_like($id);

        if ($exist) {
            return false;
        } else {
            $this->likes()->attach($id);
            return true;
        }
    }    
    
    public function unlike($id)
    {
        $exist = $this->is_like($id);

        if ($exist) {
            $this->likes()->detach($id);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_like($id)
    {
        return $this->likes()->where('post_id', $id)->exists();
    }

}
