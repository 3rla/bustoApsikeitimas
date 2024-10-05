<?php

namespace App\Traits;

trait TogglePasswordVisibilityTrait
{
    public $showPassword = false;

    /**
     * Toggles the visibility of the password.
     *
     * This method switches the value of the $showPassword property
     * between true and false, effectively toggling the visibility
     * of the password.
     *
     * @return void
     */
    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }
}
