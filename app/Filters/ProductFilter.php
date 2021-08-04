<?php

namespace App\Filters;

use App\Filters\QueryFilter;

class ProductFilter extends QueryFilter
{
    public function name($value = null)
    {
        return $value != null ? $this->builder->where('name', $value): $this->builder;
    }
    public function vendor($value = null)
    {
        return $value != null ? $this->builder->where('vendor', $value): $this->builder;
    }
    public function minPrice($value = null)
    {
        return $value != null ? $this->builder->where('price','>=', $value): $this->builder;
    }
    public function maxPrice($value = null)
    {
        return $value != null ? $this->builder->where('price','<=', $value): $this->builder;
    }
    public function sort($value = null)
    {
		$columns =[
		'price',
		'votes',
		'selling'
		];
        return in_array($value, $columns) ? $this->builder->sortBy($value)->values(): $this->builder;
    }
}
