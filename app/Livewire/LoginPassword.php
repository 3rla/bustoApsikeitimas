<?php

namespace App\Livewire;

use Livewire\Component;

class LoginPassword extends Component
{
    public $password = '';
    public $showPassword = false;

    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.login-password');
    }
}
