<?php

namespace App\JsonApi\Stories;

use App\Post;
use CloudCreativity\JsonApi\Contracts\Validators\RelationshipsValidatorInterface;
use CloudCreativity\LaravelJsonApi\Validators\AbstractValidatorProvider;

class Validators extends AbstractValidatorProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'posts';

    /**
     * @var array
     */
    protected $queryRules = [
        'filter.title' => 'sometimes|string|min:1',
        'filter.body' => 'sometimes|string|min:1',
        'filter.user' => 'sometimes|string|min:1',
        'page.number' => 'integer|min:1',
        'page.size' => 'integer|between:1,50',
    ];

    /**
     * @var array
     */
    protected $allowedSortParameters = [
        'created-at',
        'updated-at',
        'title',
    ];

    /**
     * @var array
     */
    protected $allowedFilteringParameters = [
        'id',
        'title',
        'body',
        'user',
    ];

    protected $allowedIncludePaths = [
        'characters',
        'user'
    ];

    /**
     * @inheritdoc
     */
    protected function attributeRules($record = null)
    {
        /** @var Post $record */

        // The JSON API spec says the client does not have to send all attributes for an update request, so
        // if the record already exists we need to include a 'sometimes' before required.
        $required = $record ? 'sometimes|required' : 'required';

        return [
            'title' => "$required|string|between:1,255",
            'body' => "$required|string|min:1",
        ];
    }

    /**
     * @inheritdoc
     */
    protected function relationshipRules(RelationshipsValidatorInterface $relationships, $record = null)
    {
        $relationships->hasOne('user', 'user', is_null($record), false);
        $relationships->hasMany('characters', 'character', is_null($record), false);
    }

}
