<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PixTransfer;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class PixTransferPolicy
{
    use HandlesAuthorization;

    public function show(User $user, PixTransfer $pixTransfer)
    {
        return $user->id === $pixTransfer->user_id ? Response::allow() : Response::deny('Not Found', 404);
    }
}
