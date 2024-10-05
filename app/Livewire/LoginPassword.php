<?php

namespace App\Livewire;

use Livewire\Component;
use App\Traits\TogglePasswordVisibilityTrait;

class LoginPassword extends Component
{
    public $password = '';

    use TogglePasswordVisibilityTrait;

    public function render()
    {
        return view('livewire.login-password');
    }
}
