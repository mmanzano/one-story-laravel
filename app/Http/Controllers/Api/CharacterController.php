<?php

namespace App\Http\Controllers\Api;

use App\Character;
use App\JsonApi\Characters\Hydrator;
use CloudCreativity\LaravelJsonApi\Http\Controllers\EloquentController;

class CharacterController extends EloquentController
{
    /**
     * CharacterController constructor.
     *
     * @param Hydrator $hydrator
     */
    public function __construct(Hydrator $hydrator)
    {
        parent::__construct(new Character(), $hydrator);
    }
}
