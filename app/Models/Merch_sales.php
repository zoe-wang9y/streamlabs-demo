<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merch_sales extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'merch_id', 'buyer_id',
        'name', 'item_name',
        'quantity', 'price',
        'timestamp'
    ];
}
