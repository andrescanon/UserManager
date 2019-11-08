<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(
            self::getAttributes($this->resource),
            $this->getRelationships()
        );
    }

    public static function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'email' => $resource->email,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }

    public function getRelationships()
    {
        return [
            'role' => $this->whenLoaded('role'),
        ];
    }
}
