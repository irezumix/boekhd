<?php

namespace App\Policies;

use App\User;
use App\Factuur;
use Illuminate\Auth\Access\HandlesAuthorization;

class FactuurPolicy
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
    public function update(User $user, Factuur $factuur)
    {
        return $user->id == $factuur->user_id;
    }
}
