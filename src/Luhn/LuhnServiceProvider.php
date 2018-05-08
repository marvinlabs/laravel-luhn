<?php

namespace MarvinLabs\Luhn;

use Illuminate\Support\ServiceProvider;
use MarvinLabs\Luhn\Algorithm\LuhnAlgorithm;
use MarvinLabs\Luhn\Contracts\LuhnAlgorithm as LuhnAlgorithmContract;

class LuhnServiceProvider extends ServiceProvider
{

    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton(LuhnAlgorithmContract::class, LuhnAlgorithm::class);
        $this->app->singleton('luhn', LuhnAlgorithmContract::class);
    }
}
