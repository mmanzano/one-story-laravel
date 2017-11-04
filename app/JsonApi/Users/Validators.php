<?php

namespace App\JsonApi\Authors;

use App\User;
use CloudCreativity\JsonApi\Contracts\Validators\RelationshipsValidatorInterface;
use CloudCreativity\LaravelJsonApi\Validators\AbstractValidatorProvider;

class Validators extends AbstractValidatorProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'users';

    /**
     * @var array
     */
    protected $queryRules = [
        'filter.name' => 'sometimes|string|min:1',
        'page.number' => 'integer|min:1',
        'page.size' => 'integer|between:1,50',
    ];

    /**
     * @var array
     */
    protected $allowedSortParameters = [
        'created-at',
        'updated-at',
        'name',
    ];

    /**
     * @var array
     */
    protected $allowedFilteringParameters = [
        'id',
        'name',
    ];

    /**
     * @inheritdoc
     */
    protected function attributeRules($record = null)
    {
        /** @var User $record */

        // The JSON API spec says the client does not have to send all attributes for an update request, so
        // if the record already exists we need to include a 'sometimes' before required.
        $required = $record ? 'sometimes|required' : 'required';

        return [
            'name' => "$required|string|between:1,255",
        ];
    }

    /**
     * @inheritdoc
     */
    protected function relationshipRules(RelationshipsValidatorInterface $relationships, $record = null)
    {
        $relationships->hasMany('stories', 'story', is_null($record), false);
    }

}
