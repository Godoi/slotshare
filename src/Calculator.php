<?php
namespace App;
use InvalidArgumentException;

class Calculator
{
    public function add(float $a, float $b): float
    {
        return $a + $b;
    }

    public function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    public function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    public function divide(float $a, float $b): float
    {
        if ($b == 0) {
            throw new InvalidArgumentException('Division by zero');
        }
        return $a / $b;
    }

    public function power(int $base, int $exp): int
    {
        if ($exp < 0) {
            throw new InvalidArgumentException('Negative exponent not supported');
        }
        return (int) pow($base, $exp);
    }

    public function factorial(int $n): int
    {
        if ($n < 0) {
            throw new InvalidArgumentException('Non-negative integer required');
        }
        if ($n === 0 || $n === 1) {
            return 1;
        }
        $result = 1;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }
}