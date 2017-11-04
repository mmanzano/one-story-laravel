<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\JsonApi\Authors\Hydrator;
use CloudCreativity\LaravelJsonApi\Http\Controllers\EloquentController;

class UserController extends EloquentController
{
    /**
     * CharacterController constructor.
     *
     * @param Hydrator $hydrator
     */
    public function __construct(Hydrator $hydrator)
    {
        parent::__construct(new User(), $hydrator);
    }
}
