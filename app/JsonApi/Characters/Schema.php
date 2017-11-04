<?php

namespace App\JsonApi\Characters;

use App\Character;
use CloudCreativity\JsonApi\Exceptions\RuntimeException;
use CloudCreativity\LaravelJsonApi\Schema\EloquentSchema;

class Schema extends EloquentSchema
{

    /**
     * @var string
     */
    protected $resourceType = 'characters';

    /**
     * @var array
     */
    protected $attributes = [
        'name',
        'description',
    ];

    /**
     * @param object $resource
     * @param bool $isPrimary
     * @param array $includeRelationships
     * @return array
     */
    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        if (!$resource instanceof Character) {
            throw new RuntimeException('Expecting a character model.');
        }

        return [
            'story' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => isset($includeRelationships['story']) ?
                    $resource->story : $this->createBelongsToIdentity($resource, 'story'),
            ],
        ];
    }
}
