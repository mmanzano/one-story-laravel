<?php

namespace App\JsonApi\Stories;

use App\Story;
use CloudCreativity\JsonApi\Exceptions\RuntimeException;
use CloudCreativity\LaravelJsonApi\Schema\EloquentSchema;

class Schema extends EloquentSchema
{

    /**
     * @var string
     */
    protected $resourceType = 'stories';

    /**
     * @var array
     */
    protected $attributes = [
        'title',
        'body',
    ];

    /**
     * @param object $resource
     * @param bool $isPrimary
     * @param array $includeRelationships
     * @return array
     */
    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        if (!$resource instanceof Story) {
            throw new RuntimeException('Expecting a post model.');
        }

        return [
            'user' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => isset($includeRelationships['user']) ?
                    $resource->user : $this->createBelongsToIdentity($resource, 'user'),
            ],
            'characters' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => function () use ($resource) {
                    return $resource->characters;
                },
            ],
        ];
    }
}
