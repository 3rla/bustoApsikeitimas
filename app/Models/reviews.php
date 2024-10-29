<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'reviewer_id',
        'reviewed_id',
        'home_swap_id',
        'rating',
        'comment',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function reviewed()
    {
        return $this->belongsTo(User::class, 'reviewed_id');
    }

    public function home_swap()
    {
        return $this->belongsTo(HomeSwap::class);
    }

    public function reviewedListing()
    {
        return $this->reviewed->homeListing();
    }
}
