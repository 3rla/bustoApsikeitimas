<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'reported_user_id', 'home_listing_id', 'reason', 'description', 'status'];

    public function reporter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }

    public function homeListing()
    {
        return $this->belongsTo(home_listings::class, 'home_listing_id');
    }
}
