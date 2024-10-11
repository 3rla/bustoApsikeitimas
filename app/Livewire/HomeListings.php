<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\home_listings;
use App\Traits\ProcessListingDataTrait;
use Carbon\Carbon;

class HomeListings extends Component
{
    use ProcessListingDataTrait;

    public $listings;

    protected $listeners = ['listingsFiltered' => 'updateListings'];

    public function mount()
    {
        $this->listings = home_listings::all()->map(function ($listing) {
            return $this->processListing($listing);
        });
    }

    public function updateListings($filteredListings)
    {
        $this->listings = collect($filteredListings)->map(function ($listing) {
            $listing = (object) $listing;
            return $this->processListing($listing);
        });
    }

    private function processListing($listing)
    {
        $listing->processedAmenities = $this->processAmenities($listing->amenities, 3);
        $listing->images = $this->processImages($listing->images);

        // Convert date strings to Carbon instances
        $listing->available_from = $this->formatDate($listing->available_from);
        $listing->available_to = $this->formatDate($listing->available_to);

        return $listing;
    }

    private function formatDate($dateString)
    {
        return $dateString ? Carbon::parse($dateString) : null;
    }

    public function render()
    {
        return view('livewire.home-listings');
    }
}
