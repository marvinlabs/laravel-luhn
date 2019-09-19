<?php

namespace MarvinLabs\Luhn\Rules;

use Illuminate\Contracts\Validation\Rule;
use MarvinLabs\Luhn\Contracts\LuhnAlgorithm;

class LuhnRule implements Rule
{
    protected $luhn;

    public function __construct(LuhnAlgorithm $luhn = null)
    {
        $this->luhn = $luhn ?? app(LuhnAlgorithm::class);
    }

    public function passes($attribute, $value)
    {
        return $this->luhn->isValid($value);
    }

    public function message()
    {
        return trans('validation.luhn') != 'validation.luhn'
            ? trans('validation.luhn')
            : trans('luhn::validation.luhn');
    }
}
