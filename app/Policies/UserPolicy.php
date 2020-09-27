<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function edit(User $currentUser, $user)
    {
        return $currentUser->is($user);
    }
    public function destroy(User $currentUser, User $user){
        return $currentUser->is($user);
    }
}
