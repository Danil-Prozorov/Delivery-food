<?php

namespace App\Services\Interfaces;

interface OrderRequestInterface
{
    public function orderCreate($request);

    public function cancelOrder();

    public function completeOrder();

    public function getOrderDetails();
}
