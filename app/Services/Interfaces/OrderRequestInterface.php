<?php

namespace App\Services\Interfaces;

interface OrderRequestInterface
{
    public function orderCreate($request);

    public function cancelOrder($orderID);

    public function completeOrder($orderID);

    public function getOrderDetails($orderID);
}
