<?php

namespace App\Services;

class CartService
{
    /**
     * Calculate total price: Sum of (Price * Quantity)
     * Items format: [['price' => 10, 'quantity' => 2], ...]
     */
    public function calculateTotal(array $items): float
    {
        return array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }
}
