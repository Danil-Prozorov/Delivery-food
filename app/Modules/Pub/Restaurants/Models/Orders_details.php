<?php

namespace App\Modules\Pub\Restaurants\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_details extends Model
{
    use HasFactory;

    protected $fillable = [
      'order_id',
      'item_name',
      'item_count',
      'price'
    ];

    public function order()
    {
      return $this->belongsTo(Orders::class);
    }
}
