<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\reviews;
use App\Models\home_listings;
use App\Models\home_swaps;

class ListingReviews extends Component
{
    use WithPagination;

    public $listingId;

    public function mount($listingId)
    {
        $this->listingId = $listingId;
    }

    public function render()
    {
        $listing = home_listings::findOrFail($this->listingId);

        $reviews = reviews::whereHas('home_swap', function ($query) {
            $query->Where('receiver_listing_id', $this->listingId);
        })
            ->with(['reviewer', 'home_swap'])
            ->latest()
            ->paginate(5);

        return view('livewire.listing-reviews', [
            'reviews' => $reviews,
            'listing' => $listing,
        ]);
    }
}
