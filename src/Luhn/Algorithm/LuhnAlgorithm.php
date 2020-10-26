<?php

namespace MarvinLabs\Luhn\Algorithm;

use InvalidArgumentException;
use MarvinLabs\Luhn\Contracts\LuhnAlgorithm as LuhnAlgorithmContract;

/**
 * Default implementation of the Luhn algorithm
 */
class LuhnAlgorithm implements LuhnAlgorithmContract
{

    public function isValid(string $input): bool
    {
        try {
            [$number, $lastDigit] = $this->cleanAndSplitInput($input);
        } catch (InvalidArgumentException $e) {
            return false;
        }

        $checksum = $this->computeCheckSum($number);
        $sum = $checksum + $lastDigit;

        // If the sum is divisible by 10 it is valid.
        return ($sum % 10) === 0;
    }

    public function computeCheckDigit(string $input): int
    {
        $checksum = $this->computeCheckSum($input);
        $checkDigit = $checksum % 10;
        return $checkDigit === 0 ? $checkDigit : 10 - $checkDigit;
    }

    public function computeCheckSum(string $input): int
    {
        // Need to account for the check digit.
        $nDigits = \strlen($input);
        $parity = ($nDigits + 1) % 2;
        $checksum = 0;

        for ($i = 0; $i < $nDigits; ++$i)
        {
            $digit = (int)$input[$i];

            if (($i % 2) === $parity)
            {
                $digit *= 2;
                if ($digit > 9)
                {
                    $digit -= 9;
                }
            }

            $checksum += $digit;
        }

        return $checksum;
    }

    protected function cleanAndSplitInput(string $input): array
    {
        // Remove everything not a digit, then extract check digit
        $input = \preg_replace('/\D/', '', $input);
        $inputLength = \strlen($input);

        if ($inputLength === 0) {
            throw new InvalidArgumentException;
        }
        
        $inputLength--;
        
        return [
            \substr($input, 0, $inputLength),
            (int)$input[$inputLength],
        ];
    }
}
