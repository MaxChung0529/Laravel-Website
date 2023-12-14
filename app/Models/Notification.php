<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'to_id',
        'from_id',
        'comments_id',
    ];

    public function users()
    {
        return $this->hasMany(Users::class);
    }
    public function notifiable()
    {
        return $this->morphTo();
    }
}
