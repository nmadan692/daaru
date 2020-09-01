<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\General\Blog\BlogService;
use App\Services\General\Category\CategoryService;
use App\Services\General\Product\ProductService;
use App\Services\General\Setting\SettingService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @var SettingService
     */
    private $settingService;
    /**
     * @var CategoryService
     */
    private $categoryService;
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var BlogService
     */
    private $blogService;

    /**
     * HomeController constructor.
     * @param SettingService $settingService
     * @param CategoryService $categoryService
     * @param ProductService $productService
     * @param BlogService $blogService
     */
    public function __construct(
        SettingService $settingService,
        CategoryService $categoryService,
        ProductService $productService,
        BlogService $blogService
    )
    {
        $this->settingService = $settingService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->blogService = $blogService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(){
        $setting = $this->settingService->all();
        $categories = $this->categoryService->query()->where('status' , true)->whereNull('parent_id')->get();
        $latestProducts = $this->productService->take(8, 'desc');
        $featuredProducts = $this->productService->query()->where(['is_featured' => true])->take(8)->orderBy('id', 'desc')->get();
        $recentBlogs = $this->blogService->take(3, 'desc');


        return view('front.home.index', compact('setting', 'categories', 'latestProducts', 'recentBlogs', 'featuredProducts'));
    }
}

