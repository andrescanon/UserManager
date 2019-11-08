<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserQueryFilter extends Filter
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['name', 'email', 'role'];

    /**
     * Filter the query by a given username.
     *
     * @param  string $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        return $this->builder->where('name', 'like', '%'.$value.'%');
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @param  string $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function email($value)
    {
        return $this->builder->where('email', 'like', '%'.$value.'%');
    }
    /**
     * Filter the query according to those that are unanswered.
     *
     * @param  string $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function role($value)
    {
        //return $this->builder->where('role_id', $value);
        return $this->builder->whereHas('role', function (Builder $query) use ($value) {
            $query->where('slug','like','%'.$value.'%');
            $query->orWhere('name', 'like','%'.$value.'%');
        });
    }
}