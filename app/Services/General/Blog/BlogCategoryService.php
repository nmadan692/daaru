<?php


namespace App\Services\General\Blog;


use App\Entities\BlogCategory;
use App\Services\BaseService;

class BlogCategoryService extends BaseService
{
    public function model()
    {
        return BlogCategory::class;
    }

}
