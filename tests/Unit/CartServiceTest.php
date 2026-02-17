<?php

namespace Tests\Unit;

use App\Services\CartService;
use PHPUnit\Framework\TestCase;

class CartServiceTest extends TestCase
{
    public function test_it_calculates_total_correctly(): void
    {
        $cart = new CartService();
        $items = [
            ['price' => 100, 'quantity' => 2],
            ['price' => 50,  'quantity' => 1],
        ];

        $result = $cart->calculateTotal($items);

        $this->assertEquals(250, $result);
    }

    public function test_it_returns_zero_for_empty_cart(): void
    {
        $cart = new CartService();
        $result = $cart->calculateTotal([]);

        $this->assertEquals(0, $result);
    }
}
