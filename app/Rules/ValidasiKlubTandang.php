<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidasiKlubTandang implements ValidationRule
{
    private $klubKandang;

    public function __construct($klubKandang)
    {
        $this->klubKandang = $klubKandang;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_array($value)) {
            collect($value)->each(function($val, $key) use ($fail) {
                if ($val === $this->klubKandang[$key]) $fail('Klub kandang dan klub tandang tidak boleh sama.');
            });
        } else if ($value === $this->klubKandang) {
            $fail('Klub kandang dan klub tandang tidak boleh sama.');
        }
    }
}
