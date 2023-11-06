<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'user_name',
        'user_password',
    ];

    
    public function posts()
    {
        return $this->hasMany(Posts::class);    //Can create many posts
    }
}
