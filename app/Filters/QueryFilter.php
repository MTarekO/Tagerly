<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

abstract class QueryFilter
{
    protected $request;
    protected $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Collection $query)
    {
        $this->builder = $query;
        foreach ($this->filters() as $name => $value) {
            $this->builder = method_exists($this, $name) ?
            call_user_func_array([$this, $name], array_filter([$value])) : $this->builder;
        }
        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }
}
