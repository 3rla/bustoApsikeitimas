<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\home_listings;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageUploadTrait;

class AddHouse extends Component
{
    use WithFileUploads;
    use ImageUploadTrait;

    public $title;
    public $description;
    public $city;
    public $country;
    public $address;
    public $postal_code;
    public $bedrooms;
    public $bathrooms;
    public $guest_amount;
    public $amenities;
    public $available_from;
    public $available_to;

    public $images = [];

    /**
     * Validation rules for the AddHouse component.
     */
    protected $rules = [
        'title' => 'required|string|max:50',
        'description' => 'required|string',
        'city' => 'required|string|max:50',
        'country' => 'required|string|max:50',
        'address' => 'required|string|max:255',
        'postal_code' => 'required|string|max:20',
        'bedrooms' => 'required|integer|min:1',
        'bathrooms' => 'required|integer|min:1',
        'guest_amount' => 'required|integer|min:1',
        'amenities' => 'nullable|string',
        'available_from' => 'required|date',
        'available_to' => 'required|date|after_or_equal:available_from',
        'images.*' => 'image|mimes:jpeg,png,jpg|max:102400',
        'approval_status' => 'pending',
    ];

    /**
     * Removes an image from the images array.
     *
     * @param int $index The index of the image to be removed.
     * @return void
     */
    public function removeImage($index)
    {
        array_splice($this->images, $index, 1);
    }

    /**
     * Submits the form data to create a new home listing.
     *
     * This method validates the form data, uploads the images, and creates a new
     * entry in the `home_listings` table with the provided information. After
     * successfully creating the listing, it flashes a success message to the session
     * and redirects the user to the 'my-houses' route.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit()
    {
        $this->validate();

        $imagePaths = $this->uploadImages($this->images);

        home_listings::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'city' => $this->city,
            'country' => $this->country,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'guest_amount' => $this->guest_amount,
            'is_available' => true,
            'available_from' => $this->available_from,
            'available_to' => $this->available_to,
            'amenities' => $this->amenities ? explode(',', $this->amenities) : null,
            'images' => $imagePaths,
        ]);

        // Flash success message or redirect
        session()->flash('message', 'House added successfully.');
        return redirect()->route('my-houses');
    }

    public function render()
    {
        return view('livewire.add-house');
    }
}
