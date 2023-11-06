<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'post_title',
        'caption',
        'img_path',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);  //Can be created by one user only
    }
}
