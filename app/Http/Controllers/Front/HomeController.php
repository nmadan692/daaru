<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\General\Blog\BlogService;
use App\Services\General\Category\CategoryService;
use App\Services\General\CmsPage\CmsPageService;
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
     * @var CmsPageService
     */
    private $cmsPageService;

    /**
     * HomeController constructor.
     * @param SettingService $settingService
     * @param CategoryService $categoryService
     * @param ProductService $productService
     * @param BlogService $blogService
     * @param CmsPageService $cmsPageService
     */
    public function __construct(
        SettingService $settingService,
        CategoryService $categoryService,
        ProductService $productService,
        BlogService $blogService,
        CmsPageService $cmsPageService
    )
    {
        $this->settingService = $settingService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->blogService = $blogService;
        $this->cmsPageService = $cmsPageService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(){
        $categories = $this->categoryService->query()->where('status' , true)->whereNull('parent_id')->get();
        $latestProducts = $this->productService->query()->where('city_id', defaultCity('id'))->take(8)->orderBy('id', 'desc')->get();
        $featuredProducts = $this->productService->query()->where(['is_featured' => true])->where('city_id', defaultCity('id'))->take(8)->orderBy('id', 'desc')->get();
        $recentBlogs = $this->blogService->take(3, 'desc');
        $cmsPages = $this->cmsPageService->all();


        return view('front.home.index', compact('categories', 'latestProducts', 'recentBlogs', 'featuredProducts', 'cmsPages'));
    }

    /**
     * @return Factory|View
     */
    public function showLocationPage() {
        return view('front.home.location');
    }
}

