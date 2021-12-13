<?php

namespace App\Modules\Pub\Restaurants\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'user_id',
      'total_price',
      'adres',
      'status'
    ];

    public function restaurant_products()
    {
        return $this->belongsTo(Restaurant_products::class);
    }
}
