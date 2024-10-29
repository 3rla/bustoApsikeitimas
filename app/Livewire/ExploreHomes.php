<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class ExploreHomes extends Component
{
    public $homeImages = [];

    public function mount()
    {
        $this->homeImages = Cache::remember('home_images', 3600, function () {
            return ['home1.jpg', 'home2.jpg', 'home3.jpg', 'home4.jpg', 'home5.jpg'];
        });
    }

    public function render()
    {
        return view('livewire.explore-homes');
    }
}
