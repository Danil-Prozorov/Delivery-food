<?php

namespace App\Services\Interfaces;

interface CartRequestInterface
{
    public function counterIncrease($request,$id);

    public function counterReduce($request,$id);
}