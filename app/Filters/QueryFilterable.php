<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

trait QueryFilterable
{

    /**
     * @param Builder $query
     * @param Filter $filter
     * @return Builder
     */
    public function scopeFilter(Builder $query, Filter $filter)
    {
        return $filter->apply($query);
    }

}