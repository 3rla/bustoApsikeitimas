<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\home_listings;
use App\Models\HomeSwap;
use Illuminate\Support\Facades\Auth;
use App\Traits\ProcessListingDataTrait;

class ListingDetails extends Component
{
    use ProcessListingDataTrait;

    public $listingId;
    public $listing;
    public $images = [];
    public $amenities = [];
    public $showSwapModal = false;
    public $selectedUserListing;
    public $swapMessage;
    public $startDate;
    public $endDate;
    public $userListings;

    public function mount($id)
    {
        $this->listingId = $id;
        $this->loadListing();
        $this->userListings = Auth::check() ? Auth::user()->listings : collect();
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

    public function sendSwapOffer()
    {
        $this->validate([
            'selectedUserListing' => 'required|exists:home_listings,id',
            'swapMessage' => 'required|string|max:500',
        ]);

        // Use the current listing's available dates
        $startDate = $this->listing->available_from;
        $endDate = $this->listing->available_to;

        // Ensure both dates are set
        if (!$startDate || !$endDate) {
            session()->flash('error', 'The listing does not have valid available dates.');
            return;
        }

        HomeSwap::create([
            'sender_user_id' => Auth::id(),
            'receiver_user_id' => $this->listing->user_id,
            'sender_listing_id' => $this->selectedUserListing,
            'receiver_listing_id' => $this->listing->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'sender_status' => 'pending',
            'receiver_status' => 'pending',
            'message' => $this->swapMessage,
        ]);

        $this->showSwapModal = false;
        $this->reset(['selectedUserListing', 'swapMessage']);
        session()->flash('message', 'Swap offer sent successfully!');
    }

    public function render()
    {
        return view('livewire.listing-details');
    }
}
