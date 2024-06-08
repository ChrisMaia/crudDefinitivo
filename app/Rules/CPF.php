<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CPF implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/', $value)){
            $fail("Esse não é um CPF válido, use esse formato: 000.000.000-00");
        }
    }
}
