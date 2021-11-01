<?php

namespace App\Modules\Pub\Feedback\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }
}
