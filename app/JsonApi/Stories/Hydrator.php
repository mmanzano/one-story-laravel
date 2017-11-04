<?php

namespace App\JsonApi\Stories;

use CloudCreativity\LaravelJsonApi\Hydrator\EloquentHydrator;

class Hydrator extends EloquentHydrator
{

    /**
     * @var array
     */
    protected $attributes = [
        'title',
        'body',
    ];

    /**
     * @var array
     */
    protected $relationships = [
        'user',
        'characters',
    ];

}
