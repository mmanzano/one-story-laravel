<?php

namespace App\JsonApi\Stories;

use App\Story;
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
        parent::__construct(new Story(), $paging);
    }

    /**
     * @inheritdoc
     */
    protected function filter(Builder $builder, Collection $filters)
    {
        if ($filters->has('title')) {
            $builder->where('stories.title', 'like', '%' . $filters->get('title') . '%');
        }

        if ($filters->has('body')) {
            $builder->where('stories.body', 'like', '%' . $filters->get('body') . '%');
        }

        if ($filters->has('user')) {
            $builder->where('stories.user_id', $filters->get('user'));
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
