<?php

namespace App\Livewire;

use Livewire\Component;

class RegistrationPassword extends Component
{
    public $password = '';
    public $passwordConfirmation = '';
    public $showPassword = false;

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.registration-password');
    }
}
