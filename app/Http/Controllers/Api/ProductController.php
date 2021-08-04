<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepositoryInterface;
use App\Filters\ProductFilter;

class ProductController extends Controller
{
    //
    private $repository;
    public function __construct(ProductRepositoryInterface $repository){
        $this->repository = $repository;
    }
    public function index(Request $request, ProductFilter $filters){
       $products = $filters->apply($this->repository->getAll());
        return response([
            'products'  => $products
        ]);
    }
}
