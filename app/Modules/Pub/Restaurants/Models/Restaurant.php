<?php

namespace App\Modules\Pub\Restaurants\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;


    public function restaurants_products()
    {
        return $this->hasMany(Restaurants_products::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
