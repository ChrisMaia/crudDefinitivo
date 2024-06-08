<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class telefone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^\(\d{2}\) \d{5}\-\d{4}$/', $value)){
            $fail("Esse não é um telefone válido, use esse formato: (99) 99999-9999");
        }
    }
}
