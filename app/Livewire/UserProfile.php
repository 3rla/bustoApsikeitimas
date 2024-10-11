<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\home_listings;
use App\Models\reviews;
use App\Traits\ProcessListingDataTrait;

class UserProfile extends Component
{
    use WithPagination, ProcessListingDataTrait;

    public $userId;
    public $user;
    public $listings;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::findOrFail($userId);
        $listings = home_listings::where('user_id', $userId)->get();
        $this->listings = $this->processListingsCollection($listings);
    }

    public function render()
    {
        $listings = home_listings::where('user_id', $this->userId)->get();

        foreach ($listings as $listing) {
            $listing->processedAmenities = $this->processAmenities($listing->amenities, 3);
        }

        $reviews = reviews::where('reviewed_id', $this->userId)
            ->with(['reviewer', 'home_swap'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.user-profile', [
            'reviews' => $reviews,
            'listings' => $listings,
        ]);
    }

    protected function processListingsCollection($listings)
    {
        return $listings->map(function ($listing) {
            $listing->processedAmenities = $this->processAmenities($listing->amenities, 3);
            $listing->images = $this->processImages($listing->images);
            return $listing;
        });
    }
}
