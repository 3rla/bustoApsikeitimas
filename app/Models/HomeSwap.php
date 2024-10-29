<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSwap extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_user_id',
        'receiver_user_id',
        'sender_listing_id',
        'receiver_listing_id',
        'start_date',
        'end_date',
        'sender_status',
        'receiver_status',
        'message',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the user who sent the home swap request.
     *
     */
    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender_user_id');
    }

    public function receiverUser()
    {
        return $this->belongsTo(User::class, 'receiver_user_id');
    }

    public function senderHome()
    {
        return $this->belongsTo(home_listings::class, 'sender_listing_id');
    }

    public function receiverHome()
    {
        return $this->belongsTo(home_listings::class, 'receiver_listing_id');
    }

    /**
     * Get the home listing associated with the sender.
     *
     * This function defines a relationship where the current HomeSwap model
     * belongs to a home listing identified by the 'sender_listing_id' foreign key.
     *
     */
    public function senderListing()
    {
        return $this->belongsTo(home_listings::class, 'sender_listing_id');
    }

    /**
     * Establishes a relationship indicating that this HomeSwap model belongs to a receiver listing.
     *
     */
    public function receiverListing()
    {
        return $this->belongsTo(home_listings::class, 'receiver_listing_id');
    }

    /**
     * Get the formatted status attribute.
     * This accessor method returns the status attribute with the first letter capitalized.
     *
     */
    public function getFormattedStatusAttribute()
    {
        return ucfirst($this->status);
    }

    /**
     * Get the reviews for the home swap.
     *
     * This function establishes a one-to-many relationship between the HomeSwap model
     * and the Review model, indicating that a home swap can have multiple reviews.
     *
     */
    public function reviews()
    {
        return $this->hasMany(reviews::class);
    }

    /**
     * Get the available status options for a home swap.
     *
     */
    public static function statusOptions()
    {
        return [
            'pending' => 'Pending',
            'accepted' => 'Accepted',
            'rejected' => 'Rejected',
            'completed' => 'Completed',
        ];
    }
}
