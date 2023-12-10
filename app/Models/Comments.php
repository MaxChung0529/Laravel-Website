<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'posts_id',
        'comment',
        'user_id',
    ];

    public function post() {
        return $this->belongsTo(Posts::class);
    }

    public function user() {
        return $this->belongsTo(Users::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }
}
