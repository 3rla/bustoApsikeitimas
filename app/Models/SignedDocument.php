<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignedDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_swap_id',
        'user_id',
        'document_path',
    ];

    public function homeSwap()
    {
        return $this->belongsTo(HomeSwap::class, 'home_swap_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
