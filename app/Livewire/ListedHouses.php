<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\home_listings;
use Illuminate\Support\Facades\Auth;
use App\Traits\ProcessListingDataTrait;

class ListedHouses extends Component
{
    use WithPagination, ProcessListingDataTrait;

    protected $paginationTheme = 'tailwind';

    /**
     * Renders the listed houses view with paginated house listings and their processed images.
     *
     * This method retrieves house listings for the authenticated user, processes the images
     * for each house, and returns the view with the houses and their corresponding images.
     *
     * @return \Illuminate\View\View The view displaying the listed houses and their images.
     */
    public function render()
    {
        $houses = home_listings::where('user_id', Auth::id())->paginate(10);

        $houseImages = [];
        foreach ($houses as $house) {
            $houseImages[$house->id] = $this->processImages($house->images);
        }

        return view('livewire.listed-houses', [
            'houses' => $houses,
            'houseImages' => $houseImages,
        ]);
    }
}
