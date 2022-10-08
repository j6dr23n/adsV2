<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class RevokeUserTokensResolver
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::where('email', $args['email'])->firstOrFail();
        if ($user && $user->tokens() !== null) {
            $user->tokens()->delete();

            return [
                'status' => 'All Token Revoked!!!'
            ];
        }

        return [
            'status' => 'There is no user with this email!!!'
        ];
    }
}
