<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;

class EncryptedText implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value ? Crypt::encryptString($value) : null;
    }
}
