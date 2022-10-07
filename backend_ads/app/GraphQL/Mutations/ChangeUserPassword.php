<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class ChangeUserPassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::find($args['user_id'])->firstOrFail();
        if (! $user || ! Hash::check($args['old_password'], $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['Password doesn\'t match'],
            ]);
        };

        $user->password = bcrypt($args['new_password']);
        $user->save();

        return [
            'status' => 'PASSWORD_UPDATED',
        ];
    }
}
