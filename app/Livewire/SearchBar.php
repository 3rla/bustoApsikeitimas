<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\home_listings;
use App\Models\User;

class SearchBar extends Component
{
    public $selectedLocations = [];
    public $locations;
    public $available_from;
    public $available_to;
    public $guest_count;
    public $availableUsers;

    public function mount()
    {
        $this->availableUsers = User::orderBy('name')->get();
        $this->loadLocations();
    }

    private function loadLocations()
    {
        $locations = home_listings::select('country', 'city')
            ->distinct()
            ->orderBy('country')
            ->orderBy('city')
            ->get();

        $groupedLocations = [];
        foreach ($locations as $location) {
            $groupedLocations[$location->country][] = $location->city;
        }

        $this->locations = $groupedLocations;
    }

    public function searchListings()
    {
        $query = home_listings::query();

        if (!empty($this->selectedLocations)) {
            $query->where(function ($q) {
                foreach ($this->selectedLocations as $location) {
                    list($country, $city) = explode(',', $location);
                    $q->orWhere(function ($subQ) use ($country, $city) {
                        $subQ->where('country', $country)->where('city', $city);
                    });
                }
            });
        }

        if ($this->available_from) {
            $query->where('available_from', '>=', $this->available_from);
        }

        if ($this->available_to) {
            $query->where('available_to', '<=', $this->available_to);
        }

        if ($this->guest_count) {
            $query->where('guest_amount', '>=', $this->guest_count);
        }

        $results = $query->get();

        $this->dispatch('listingsFiltered', filteredListings: $results->toArray());
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
