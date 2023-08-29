<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'user_id', 'follower_id',
        'name', 'followed_at'
    ];
}
