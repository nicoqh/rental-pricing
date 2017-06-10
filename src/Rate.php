<?php

namespace Rent;

class Rate
{
    private $price;
    private $unitInHours;

    public function __construct(Price $price, $unitInHours)
    {
        $this->price = $price;
        $this->unitInHours = $unitInHours;
    }

    public function getPrice() : Price
    {
        return $this->price;
    }

    public function getTotal(RentalPeriod $rentalPeriod) : Price
    {
        $hourCount = $rentalPeriod->getHourCount();
        $factor = (int) ceil($hourCount / $this->unitInHours);

        return $this->getPrice()->multiply($factor);
    }
}
