<?php

namespace App\JsonApi\Characters;

use CloudCreativity\LaravelJsonApi\Hydrator\EloquentHydrator;

class Hydrator extends EloquentHydrator
{

    /**
     * @var array
     */
    protected $attributes = [
        'name',
        'description',
    ];

    /**
     * @var array
     */
    protected $relationships = [
        'story',
    ];

}
