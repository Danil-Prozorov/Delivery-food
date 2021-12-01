<?php

namespace App\Modules\Pub\Restaurants\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    public function restaurant_products()
    {
        return $this->belongsTo(Restaurant_products::class);
    }

    public function order_details()
    {
        return $this->hasMany(Order_details::class);
    }
}
