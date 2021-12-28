<?php

namespace App\Services\Interfaces;

interface CartValidationInterface
{
    public static function existInCart($item_id, $user_id);

    public function cartEmpty();

    public function sameId($first_id, $second_id);
}
