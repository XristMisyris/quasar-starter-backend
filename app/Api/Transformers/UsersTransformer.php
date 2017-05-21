<?php


namespace App\Api\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UsersTransformer extends TransformerAbstract {

    public function transform(User $user)
    {
        return [
            'id'        => $user->id,
            'name'      => $user->name
        ];
    }
}