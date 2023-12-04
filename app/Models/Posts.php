<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'post_title',
        'caption',
        'user_id',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class); //Can be created by one user only
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    
}
