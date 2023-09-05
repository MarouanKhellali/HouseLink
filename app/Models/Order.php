<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'seller_id',
        'property_id',
        'is_accepted',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
