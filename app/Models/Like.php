<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'posts_id',
    ];

    public function notifications() {
        return $this->morphMany('App\Models\Notification','notifiable');
    }


}
