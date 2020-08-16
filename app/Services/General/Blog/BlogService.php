<?php


namespace App\Services\General\Blog;


use App\Entities\Blog;
use App\Services\BaseService;

class BlogService extends BaseService
{
    public  function model()
    {
        return Blog::class;
    }

}
