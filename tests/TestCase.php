<?php

namespace MarvinLabs\Luhn\Tests;

use MarvinLabs\Luhn\Facades\Luhn;
use MarvinLabs\Luhn\LuhnServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{

    public const VALID_LUHN_NUMBER = '837668185';
    public const INVALID_LUHN_NUMBER = '123456789';

    protected function getPackageProviders($app)
    {
        return [
            LuhnServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Luhn' => Luhn::class,
        ];
    }
}
