<?php

namespace Rent;

use InvalidArgumentException;

class Price
{
    private $amount;

    public static function fromAmount($amount)
    {
        if (!is_int($amount)) {
            throw new InvalidArgumentException('Amount must be an integer.');
        }

        $price = new static;
        $price->amount = $amount;

        return $price;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function add(Price $other)
    {
        return Price::fromAmount($this->amount + $other->amount);
    }

    public function multiply($multiplier)
    {
        $product = intval(round($this->amount * $multiplier, 0));

        return Price::fromAmount($product);
    }

    public function equals(Price $other)
    {
        return $this->amount == $other->amount;
    }

    public function isZero()
    {
        return $this->amount === 0;
    }

    public function isPositive()
    {
        return $this->amount > 0;
    }

    public function isNegative()
    {
        return $this->amount < 0;
    }
}
