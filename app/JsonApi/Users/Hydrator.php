<?php

namespace App\JsonApi\Users;

use CloudCreativity\LaravelJsonApi\Hydrator\EloquentHydrator;

class Hydrator extends EloquentHydrator
{

    /**
     * @var array
     */
    protected $attributes = [
        'name',
    ];

    /**
     * @var array
     */
    protected $relationships = [
        'stories',
    ];

}
