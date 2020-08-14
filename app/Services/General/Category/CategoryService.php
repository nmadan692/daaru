<?php


namespace App\Services\General\Category;


use App\Entities\Category;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    public function model()
    {
        return Category::class;
    }

}
