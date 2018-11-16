<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'      => (int) $user->id,
            'name'   => $user->name,
            'email'   => $user->email,
            'created_at'   => (string) $user->created_at,
            'updated_at'   => (string) $user->updated_at,
        ];
    }
}