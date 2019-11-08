<?php

namespace App\JsonApi\Addresses;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'addresses';

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
        return [
            'first_name' => $resource->first_name,
            'last_name' => $resource->last_name,
            'label' => $resource->label,
            'company' => $resource->company,
            'country_code' => $resource->country_code,
            'street' => $resource->street,
            'state' => $resource->state,
            'city' => $resource->city,
            'postcode' => $resource->postcode,
            'is_primary' => $resource->is_primary,
            'is_shipping' => $resource->is_shipping,
            'is_billing' => $resource->is_billing,
            'created-at' => $resource->created_at->toAtomString(),
            'updated-at' => $resource->updated_at->toAtomString(),
        ];
    }

    /**
     * @param object $resource
     * @param bool $isPrimary
     * @param array $includeRelationships
     * @return array
     */
    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'addressable' => [
                self::SHOW_DATA => true,
                self::DATA => $resource->addressable
            ],
        ];
    }
}
