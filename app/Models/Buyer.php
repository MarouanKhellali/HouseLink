<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'city',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }

    public function savedProperties()
    {
        return $this->belongsToMany(Property::class, 'saves', 'buyer_id', 'property_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'buyer_id');
    }
}
