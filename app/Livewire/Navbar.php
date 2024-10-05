<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $isAdmin;

    public function mount()
    {
        $this->isAdmin = Auth::check() && Auth::user()->is_admin;
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
