<?php

namespace App\Api\Controllers;

use App\Api\Transformers\JokesTransformer;
use App\Http\Requests;
use App\Joke;

class JokesController extends BaseController
{
    public function index()
    {
        $jokes = Joke::all();

        return $this->collection($jokes, new JokesTransformer);
    }
}
