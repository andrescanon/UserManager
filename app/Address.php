<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{

    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'label',
        'first_name',
        'last_name',
        'company',
        'country_code',
        'street',
        'state',
        'city',
        'postcode',
        'is_primary',
        'is_billing',
        'is_shipping',
    ];

    protected $casts = [
        'addressable_id' => 'integer',
        'addressable_type' => 'string',
        'label' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'company' => 'string',
        'country_code' => 'string',
        'street' => 'string',
        'state' => 'string',
        'city' => 'string',
        'postcode' => 'string',
        'is_primary' => 'boolean',
        'is_billing' => 'boolean',
        'is_shipping' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    protected $rules = [
        'addressable_id' => 'required|integer',
        'addressable_type' => 'required|string|max:150',
        'label' => 'nullable|string|max:150',
        'first_name' => 'required|string|max:150',
        'last_name' => 'nullable|string|max:150',
        'company' => 'nullable|string|max:150',
        'country_code' => 'nullable|alpha|size:2|country',
        'street' => 'nullable|string|max:150',
        'state' => 'nullable|string|max:150',
        'city' => 'nullable|string|max:150',
        'postcode' => 'nullable|string|max:150',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'is_primary' => 'sometimes|boolean',
        'is_billing' => 'sometimes|boolean',
        'is_shipping' => 'sometimes|boolean',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo('addressable', 'addressable_type', 'addressable_id');
    }

    public function scopeIsPrimary(Builder $builder): Builder
    {
        return $builder->where('is_primary', true);
    }

    public function scopeIsBilling(Builder $builder): Builder
    {
        return $builder->where('is_billing', true);
    }

    public function scopeIsShipping(Builder $builder): Builder
    {
        return $builder->where('is_shipping', true);
    }

    public function scopeInCountry(Builder $builder, string $countryCode): Builder
    {
        return $builder->where('country_code', $countryCode);
    }

}
