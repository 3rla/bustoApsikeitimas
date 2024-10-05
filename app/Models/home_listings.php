<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ImageUploadTrait;

class home_listings extends Model
{
    use HasFactory,
        SoftDeletes,
        ImageUploadTrait;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'city',
        'country',
        'address',
        'postal_code',
        'bedrooms',
        'bathrooms',
        'guest_amount',
        'is_available',
        'available_from',
        'available_to',
        'amenities',
        'images',
    ];

    protected $casts = [
        'amenities' => 'array',
        'images' => 'array',
        'available_from' => 'datetime',
        'available_to' => 'datetime',
    ];

    // Relationship with user (who owns the listing)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with swaps where this listing is involved
    public function swapsAsSender()
    {
        return $this->hasMany(HomeSwap::class, 'sender_listing_id');
    }

    public function swapsAsReceiver()
    {
        return $this->hasMany(HomeSwap::class, 'receiver_listing_id');
    }

    // Accessor for availability status
    public function getIsAvailableAttribute($value)
    {
        return $value ? 'Available' : 'Not Available';
    }

    // Mutator to store JSON for amenities
    public function setAmenitiesAttribute($value)
    {
        $this->attributes['amenities'] = json_encode($value);
    }

    public function getAmenitiesAttribute($value)
    {
        return json_decode($value);
    }

    // Scope for searching listings by city or country
    public function scopeLocation($query, $city, $country)
    {
        return $query->where('city', $city)->where('country', $country);
    }
}
