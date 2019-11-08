<?php

namespace App\Http\Resources\Datatables;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersDatatable extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            //'role' => $this->whenLoaded('role'),
            'role' => $this->whenLoaded('role', function () {
                return $this->resource->present()->role;
            }),
            'created_at' => $this->resource->present()->humans_created_at,
            'updated_at' => $this->resource->present()->humans_updated_at,
            'actions' => $this->resource->present()->actions,
        ];
    }
}