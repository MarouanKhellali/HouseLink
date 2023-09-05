<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'seller_id',
        'hasfile',
        'file',
        'seen',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
