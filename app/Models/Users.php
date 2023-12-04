<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'email',
        'user_name',
        'password',
        'avatar',
    ];
    
    public function posts()
    {
        return $this->hasMany(Posts::class);    //Can create many posts
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
