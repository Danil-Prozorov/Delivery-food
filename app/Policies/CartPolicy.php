<?php

namespace App\Policies;

use App\Modules\Admin\User\Models\User;
use App\Modules\Pub\Cart\Models\Cart;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(User $user)
    {

    }
}
