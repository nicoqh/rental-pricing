<?php

namespace Rent;

use InvalidArgumentException;

class Price
{
    private $amount;

    public static function fromAmount(int $amount) : Price
    {
        $price = new static;
        $price->amount = $amount;

        return $price;
    }

    public function getAmount() : int
    {
        return $this->amount;
    }

    public function add(Price $other) : Price
    {
        return Price::fromAmount($this->amount + $other->amount);
    }

    public function multiply($multiplier) : Price
    {
        $product = intval(round($this->amount * $multiplier, 0));

        return Price::fromAmount($product);
    }

    public function equals(Price $other) : bool
    {
        return $this->amount == $other->amount;
    }

    public function isZero() : bool
    {
        return $this->amount === 0;
    }

    public function isPositive() : bool
    {
        return $this->amount > 0;
    }

    public function isNegative() : bool
    {
        return $this->amount < 0;
    }
}
