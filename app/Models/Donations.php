<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'user_id', 'donator_id',
        'name', 'currency',
        'amount', 'message',
        'timestamp'
    ];
}
