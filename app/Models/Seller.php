<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'card_id',
        'phone',
        'city',
        'address',
        'bio',
        'accepted',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'seller_id');
    }

    public function acceptedProperties()
    {
        return $this->hasMany(Property::class, 'seller_id')->where('accepted', true);
    }
}
