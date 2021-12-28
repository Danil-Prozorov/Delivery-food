<?php

namespace App\Services\Interfaces;

interface CartValidationInterface
{
    public static function existInCart();

    public function cartEmpty();

    public static function sameId();
}