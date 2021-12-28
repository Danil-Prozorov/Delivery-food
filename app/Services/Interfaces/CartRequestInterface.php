<?php

namespace App\Services\Interfaces;

interface CartRequestInterface
{
    public function counterIncrease($id);

    public function counterReduce($id);
}
