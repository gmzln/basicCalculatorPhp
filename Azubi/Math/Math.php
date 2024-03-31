<?php

namespace Azubi\Math;

class Math implements MathInterface
{
    public function add(float $value1, float $value2): float
    {
        return $value1 + $value2;
    }

    public function subtract(float $value1, float $value2): float
    {
        return $value1 - $value2;
    }

    public function multiply(float $value1, float $value2): float
    {
        return $value1 * $value2;
    }

    public function divide(float $value1, float $value2): float
    {
        //division by zero is mathematically undefined and causes a runtime error in PHP
        if ($value2 === 0) {
            throw new \InvalidArgumentException("Division by zero");
        }
        return $value1 / $value2;
    }
}
