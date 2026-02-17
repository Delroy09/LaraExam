<?php

namespace Tests\Unit;

use App\Services\CartService;
use PHPUnit\Framework\TestCase;

class CartServiceTest extends TestCase
{
    public function test_it_calculates_total_correctly(): void
    {
        // 1. Arrange: Create the service and some dummy data
        $cart = new CartService();
        $items = [
            ['price' => 100, 'quantity' => 2], // 200
            ['price' => 50,  'quantity' => 1], // 50
        ];

        // 2. Act: Run the method
        $result = $cart->calculateTotal($items);

        // 3. Assert: Check if 200 + 50 equals 250
        $this->assertEquals(250, $result);
    }

    public function test_it_returns_zero_for_empty_cart(): void
    {
        $cart = new CartService();

        // Pass an empty array
        $result = $cart->calculateTotal([]);

        $this->assertEquals(0, $result);
    }
}
