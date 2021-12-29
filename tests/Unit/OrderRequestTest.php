<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\Requests\OrderRequests;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class OrderRequestTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_order_details()
    {
        $orderDetails = new OrderRequests();
        $details = $orderDetails->getOrderDetails(23);

        $this->assertIsObject($details);
    }

    public function test_make_order()
    {
        $request = array(
            'total_price' => 600,
            'address'     => 'fkdsfsdfs',
        );

        $makeOrder = new OrderRequests();
        $order = $makeOrder->orderCreate($request);

        $this->assertIsObject($order);
    }

    public function test_get_all_orders()
    {
        $orders = new OrderRequests();
        $orders = $orders->getAllOrders(null);

        $this->assertIsObject($orders);
    }

}
