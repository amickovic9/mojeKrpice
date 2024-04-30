<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
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
    public function customer(){
        return $this->belongsTo(User::class,'user_id');
    }
}
