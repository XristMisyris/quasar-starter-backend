<?php

namespace App\Api\Transformers;

use App\Joke;
use League\Fractal\TransformerAbstract;

class JokesTransformer extends TransformerAbstract {

    protected $availableIncludes = ['user'];

    public function transform(Joke $joke)
    {
        return [
            'id'        => $joke->id,
            'joke'      => $joke->body
        ];
    }

    public function includeUser(Joke $joke)
    {
        return $this->item($joke->user, new UsersTransformer);
    }
}
