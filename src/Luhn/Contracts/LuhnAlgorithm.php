<?php

namespace MarvinLabs\Luhn\Contracts;

interface LuhnAlgorithm
{
    /**
     * Check that the given input is valid according to the Luhn algorithm
     *
     * @param string $input The input string will be cleaned up of every non-digit characters before any computation
     * @return bool true if the input is valid
     */
    public function isValid(string $input): bool;

    /**
     * Compute the check digit for a given input (i.e. the last digit than must be appended so that isValid returns
     * true)
     *
     * @param string $input The input number. This will not be cleaned up and must be composed of only digits.
     * @return int The digit
     */
    public function computeCheckDigit(string $input): int;

    /**
     * Compute the checksum for a given input.
     *
     * @param string $input The input number. This will not be cleaned up and must be composed of only digits.
     * @return int The checksum
     */
    public function computeCheckSum(string $input): int;
}
