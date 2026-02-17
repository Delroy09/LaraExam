<?php

namespace App\Services;

class CartService
{
    public function calculateTotal(array $items): float
    {
        return array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }
}
