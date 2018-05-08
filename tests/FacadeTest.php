<?php

namespace MarvinLabs\Luhn\Tests;

use MarvinLabs\Luhn\Facades\Luhn;

class FacadeTest extends TestCase
{
    /** @test */
    public function can_access_the_facade()
    {
        $this->assertTrue(Luhn::isValid(TestCase::VALID_LUHN_NUMBER));
    }
}
