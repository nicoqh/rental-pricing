<?php

namespace Rent;

class OrderItem
{
    protected $title;
    protected $quantity;
    protected $rate;
    protected $rentalPeriod;

    public function __construct($title, $quantity, Rate $rate, RentalPeriod $rentalPeriod)
    {
        $this->title = $title;
        $this->quantity = $quantity;
        $this->rate = $rate;
        $this->rentalPeriod = $rentalPeriod;
    }

    public function getPrice() : Price
    {
        return $this->rate->getTotal($this->rentalPeriod)->multiply($this->quantity);
    }
}
