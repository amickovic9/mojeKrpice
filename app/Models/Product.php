<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\OrderController;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'size',
        'image',
        'price',
        'available',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
