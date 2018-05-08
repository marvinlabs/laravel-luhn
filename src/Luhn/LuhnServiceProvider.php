<?php

namespace MarvinLabs\Luhn;

use Illuminate\Support\ServiceProvider;
use MarvinLabs\Luhn\Algorithm\LuhnAlgorithm;
use MarvinLabs\Luhn\Contracts\LuhnAlgorithm as LuhnAlgorithmContract;
use MarvinLabs\Luhn\Rules\LuhnRule;

class LuhnServiceProvider extends ServiceProvider
{
    private $validationRules = [
        'luhn' => LuhnRule::class,
    ];

    public function boot()
    {
        $this->registerValidationRules();
    }

    public function register()
    {
        $this->registerBindings();
    }

    protected function registerValidationRules(): void
    {
        foreach ($this->validationRules as $shortName => $className)
        {
            $this->app->validator->extend($shortName, $className . '@passes');
        }
    }

    protected function registerBindings(): void
    {
        $this->app->singleton(LuhnAlgorithmContract::class, LuhnAlgorithm::class);
        $this->app->singleton('luhn', LuhnAlgorithmContract::class);
    }
}
