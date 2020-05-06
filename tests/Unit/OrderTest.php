<?php
namespace Tests\Unit;

use App\Order;
use App\Product;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    protected $product;

    public function setUp(): void
    {
        $this->product = new Product('Fallout',59);
    }

    /** @test */
    function an_order_consists_of_products()
    {
        $order = $this->createOrderWithProducts();

        $this->assertCount(4,$order->products());
    }

    /** @test */
    function an_order_determine_the_total_cost_of_all_its_products()
    {
        $order = $this->createOrderWithProducts();

        $this->assertEquals(66,$order->total());
    }

    protected function createOrderWithProducts()
    {
        $order = new Order;

        $product= new Product('Fallout',59);
        $product2= new Product('Pillowcase', 7);

        $order->add($product);
        $order->add($product2);
    }
}
