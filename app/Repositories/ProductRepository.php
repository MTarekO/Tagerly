<?php 

namespace App\Repositories;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
	public function getAll(){
		$data = \Storage::disk('public')->exists('products.json')? collect( json_decode(\Storage::disk('public')->get('products.json')) ): collect();
		return $data;
	} 

}