<?php


namespace App\Services\General\Product;


use App\Entities\Product;
use App\Services\BaseService;

class ProductService extends BaseService
{
    public function model()
    {
        return Product::class;
    }
}
