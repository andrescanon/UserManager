<?php

namespace App\Http\Resources\Datatables;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressesDatatable extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'company' => $this->company,
            'country_code' => $this->country_code,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'label' => $this->label,
            'is_primary' => $this->is_primary,
            'is_billing' => $this->is_billing,
            'is_shipping' => $this->is_shipping,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }

}