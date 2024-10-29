<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\reviews;

class RandomReviews extends Component
{
    public $reviews;

    public function mount()
    {
        $this->reviews = reviews::with([
            'reviewer:id,name',
            'home_swap:id,receiver_listing_id',
            'home_swap.receiverListing:id,city'
        ])
            ->select('id', 'reviewer_id', 'home_swap_id', 'rating', 'comment')
            ->inRandomOrder()
            ->take(3)
            ->get();
    }
    public function render()
    {
        return view('livewire.random-reviews');
    }
}
