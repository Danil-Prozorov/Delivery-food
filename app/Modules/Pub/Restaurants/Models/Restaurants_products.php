<?php

namespace App\Modules\Pub\Restaurants\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Pub\Restaurants\Models\Restaurant;

class Restaurants_products extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
