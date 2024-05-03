<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    protected $fillable = [
        'user_id',
        'contactMessage_id',
        'reply'
    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function message()
    {
        return $this->belongsTo(ContactMessages::class);
    }
}
