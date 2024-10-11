<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $searchResults = [];
    public $isAdmin;

    public function mount()
    {
        $this->isAdmin = Auth::check() && Auth::user()->is_admin;
    }

    public function searchUsers($search)
    {
        if (strlen($search) >= 2) {
            $this->searchResults = User::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $search . '%']);
            })
                ->limit(5)
                ->get();
        } else {
            $this->searchResults = [];
        }
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
