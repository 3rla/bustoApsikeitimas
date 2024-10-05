<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\home_listings;
use App\Traits\ProcessListingDataTrait;

class ListingDetails extends Component
{
    use ProcessListingDataTrait;

    public $listingId;
    public $listing;
    public $images = [];
    public $amenities = [];

    public function mount($id)
    {
        $this->listingId = $id;
        $this->loadListing();
    }

    /**
     * Loads the listing details based on the provided listing ID.
     *
     * This method retrieves the listing from the database using the listing ID,
     * processes the images and amenities associated with the listing, and assigns
     * them to the respective properties.
     *
     */
    public function loadListing()
    {
        $this->listing = home_listings::findOrFail($this->listingId);
        $this->images = $this->processImages($this->listing->images);
        $this->amenities = $this->processAmenities($this->listing->amenities);
    }

    public function render()
    {
        return view('livewire.listing-details');
    }
}
