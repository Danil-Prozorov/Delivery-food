<?php

namespace App\Modules\Pub\Cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Admin\User\Models\User;

class Cart extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
