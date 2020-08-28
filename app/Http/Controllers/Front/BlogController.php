<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\General\Blog\BlogCategoryService;
use App\Services\General\Blog\BlogService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * @var BlogService
     */
    private $blogService;
    /**
     * @var BlogCategoryService
     */
    private $blogCategoryService;

    /**
     * BlogController constructor.
     * @param BlogService $blogService
     * @param BlogCategoryService $blogCategoryService
     */
    public function __construct(
        BlogService $blogService,
        BlogCategoryService $blogCategoryService
    )
    {
        $this->blogService = $blogService;
        $this->blogCategoryService = $blogCategoryService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request){
        $blogCategory = $this->blogCategoryService->all();
        $recentBlog = $this->blogService->take(4, 'desc');
        if($id = $request->input('id')) {
            $blog = $this->blogService->where(['id'=> decrypt($id)])->get();
        }
        else {
            $blog = $this->blogService->all();
        }

        return view('front.blog.blog', compact('blogCategory', 'blog', 'recentBlog'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id){
        $blogCategory = $this->blogCategoryService->all();
        $blog = $this->blogService->findOrFail(decrypt($id));
        $blog->load('blogCategory');
        $recentBlog = $this->blogService->take(4, 'desc');

        return view('front.blog.blog-details', compact('blogCategory', 'blog', 'recentBlog'));
    }
}
