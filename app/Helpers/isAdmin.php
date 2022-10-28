<?php

use App\Models\User;

function isAdmin(User $user){
    return $user->role->name === \App\Helpers\Enums\Roles::Admin->value;
}
