<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'images',
        'title',
        'description',
        'bedrooms',
        'property_type',
        'action_type',
        'city',
        'area',
        'is_active',
        'rating',
        'review_id',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function propertyReviews()
    {
        return $this->hasMany(PropertyReview::class, 'property_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'property_id');
    }

    public function saves()
    {
        return $this->hasMany(Save::class, 'property_id');
    }
}
