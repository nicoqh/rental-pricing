<?php

namespace Rent;

class Order
{
    public $items = [];

    public function addItem(OrderItem $item)
    {
        $this->items[] = $item;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotal() : Price
    {
        $total = Price::fromAmount(0);

        foreach ($this->items as $item) {
            $total = $total->add($item->getPrice());
        }

        return $total;
    }
}
