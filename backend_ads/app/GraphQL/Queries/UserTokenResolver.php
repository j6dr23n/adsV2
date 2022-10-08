<?php

namespace App\GraphQL\Queries;

use App\Models\User;

final class UserTokenResolver
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $tokens = null;
        $user = User::where('email', $args['email'])->firstOrFail();
        if ($user) {
            $tokens = $user->tokens()->get();
        }

        return $tokens;
    }
}
