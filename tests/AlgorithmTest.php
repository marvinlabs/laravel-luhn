<?php

namespace MarvinLabs\Luhn\Tests;

use MarvinLabs\Luhn\Algorithm\LuhnAlgorithm;
use MarvinLabs\Luhn\Contracts\LuhnAlgorithm as LuhnAlgorithmContract;

class AlgorithmTest extends TestCase
{
    protected $implementations = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->implementations['di-container'] = $this->app[LuhnAlgorithmContract::class];
        $this->implementations[LuhnAlgorithm::class] = new LuhnAlgorithm();
    }

    public function provideIsValidTestInput(): array
    {
        return [
            'default'        => ['837668185', true],
            'zero'           => ['0', true],
            'with_spaces'    => ['837 668  185', true],
            '123455'         => ['123455', true],
            '4103219202'     => ['4103219202', true],
            '31997233700020' => ['31997233700020', true],
            'large'          => ['89148000003974165685', true],
            'empty'          => ['', false],
            'invalid'        => ['123456789', false],
            '123'            => ['123', false],
        ];
    }

    public function provideCheckDigitTestInput(): array
    {
        return [
            'default'        => ['83766818', 5],
            '4103219202'     => ['410321920', 2],
            'large'          => ['8914800000397416568', 5],
        ];
    }

    public function provideCheckSumTestInput(): array
    {
        return [
            'default'        => ['3199723370002', 50],
        ];
    }

    /**
     * @test
     * @dataProvider provideIsValidTestInput
     */
    public function can_validate_input(string $input, bool $expectedResult): void
    {
        foreach ($this->implementations as $name => $instance)
        {
            $this->assertEquals($expectedResult,
                $instance->isValid($input),
                "Unexpected isValid result for $name implementation on input $input");
        }
    }

    /**
     * @test
     * @dataProvider provideCheckDigitTestInput
     */
    public function can_compute_check_digit(string $number, int $expectedResult): void
    {
        foreach ($this->implementations as $name => $instance)
        {
            $this->assertEquals($expectedResult,
                $instance->computeCheckDigit($number),
                "Unexpected computeCheckDigit result for $name implementation on input $number");
        }
    }

    /**
     * @test
     * @dataProvider provideCheckSumTestInput
     */
    public function can_compute_check_sum(string $number, int $expectedResult): void
    {
        foreach ($this->implementations as $name => $instance)
        {
            $this->assertEquals($expectedResult,
                $instance->computeCheckSum($number),
                "Unexpected computeCheckSum result for $name implementation on input $number");
        }
    }
}
