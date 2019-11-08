<?php

namespace App\JsonApi\Users;

use Neomerx\JsonApi\Schema\SchemaProvider;
use App\Http\Resources\User as UserResource;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'users';

    /**
     * @var array
     */
    protected $attributes = ['name', 'email', 'created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $relationships = [
        'role',
        'addresses',
    ];

    /**
     * @param $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return UserResource::getAttributes($resource);
    }
}
