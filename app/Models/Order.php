<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable= [
        'user_id',
        'product_id',
        'firstName',
        'lastName',
        'phone_number',
        'address',
        'accepted',
        'delivered',
        'note',
    ];
}
