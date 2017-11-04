<?php

namespace App\JsonApi\Characters;

use App\Character;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use CloudCreativity\LaravelJsonApi\Store\EloquentAdapter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Adapter extends EloquentAdapter
{

    /**
     * @var array
     */
    protected $defaultPagination = [
        'number' => 10,
    ];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        parent::__construct(new Character(), $paging);
    }

    /**
     * @inheritdoc
     */
    protected function filter(Builder $builder, Collection $filters)
    {
        if ($filters->has('name')) {
            $builder->where('stories.name', 'like', '%' . $filters->get('name') . '%');
        }

        if ($filters->has('description')) {
            $builder->where('stories.description', 'like', '%' . $filters->get('description') . '%');
        }
    }

    /**
     * @inheritdoc
     */
    protected function isSearchOne(Collection $filters)
    {
        return $filters->has('id');
    }
}
