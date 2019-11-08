<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

interface Filterable
{

    public function apply(Builder $builder);

}