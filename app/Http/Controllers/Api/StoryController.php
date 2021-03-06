<?php

namespace App\Http\Controllers\Api;

use App\JsonApi\Stories\Hydrator;
use App\Story;
use CloudCreativity\LaravelJsonApi\Http\Controllers\EloquentController;

class StoryController extends EloquentController
{
    /**
     * StoryController constructor.
     *
     * @param Hydrator $hydrator
     */
    public function __construct(Hydrator $hydrator)
    {
        parent::__construct(new Story(), $hydrator);
    }
}
