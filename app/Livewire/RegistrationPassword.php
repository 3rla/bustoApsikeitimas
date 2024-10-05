<?php

namespace App\Livewire;

use Livewire\Component;
use App\Traits\TogglePasswordVisibilityTrait;

class RegistrationPassword extends Component
{
    public $password = '';
    public $passwordConfirmation = '';

    use TogglePasswordVisibilityTrait;

    public function render()
    {
        return view('livewire.registration-password');
    }
}
