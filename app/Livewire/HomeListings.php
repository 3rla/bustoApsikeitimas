<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\home_listings;
use App\Traits\ProcessListingDataTrait;

class HomeListings extends Component
{
    use ProcessListingDataTrait;

    public $listings;

    /**
     * Initializes the component and processes the home listings.
     *
     * This method is called when the component is mounted. It retrieves all home listings,
     * processes their amenities and images, and assigns the processed listings to the
     * component's `listings` property.
     *
     */
    public function mount()
    {
        $this->listings = home_listings::all()->map(function ($listing) {
            $listing->processedAmenities = $this->processAmenities($listing->amenities, 3);
            $listing->images = $this->processImages($listing->images);
            return $listing;
        });
    }

    public function render()
    {
        return view('livewire.home-listings');
    }
}
