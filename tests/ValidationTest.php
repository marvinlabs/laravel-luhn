<?php

namespace MarvinLabs\Luhn\Tests;

use Illuminate\Support\Facades\Validator;
use MarvinLabs\Luhn\Rules\LuhnRule;

class ValidationTest extends TestCase
{
    /** @test */
    public function can_use_validation_class()
    {
        $validator = Validator::make(['number' => TestCase::VALID_LUHN_NUMBER], ['number' => new LuhnRule()]);
        $this->assertTrue($validator->passes());

        $validator = Validator::make(['number' => TestCase::INVALID_LUHN_NUMBER], ['number' => new LuhnRule()]);
        $this->assertTrue($validator->fails());
    }

    /** @test */
    public function can_use_shorthand_notation()
    {
        $validator = Validator::make(['number' => TestCase::VALID_LUHN_NUMBER], ['number' => 'luhn']);
        $this->assertTrue($validator->passes());

        $validator = Validator::make(['number' => TestCase::INVALID_LUHN_NUMBER], ['number' => 'luhn']);
        $this->assertTrue($validator->fails());
    }

    /** @test */
    public function does_not_throw_on_edge_cases()
    {
        $validator = Validator::make(['number' => 'notanumber'], ['number' => 'luhn']);
        $this->assertTrue($validator->fails());
    }
}
