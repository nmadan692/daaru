<?php


namespace App\Services\General\Brand;


use App\Entities\Brand;
use App\Services\BaseService;

class BrandService extends BaseService
{
    public function model()
    {
        return Brand::class;
    }
}
