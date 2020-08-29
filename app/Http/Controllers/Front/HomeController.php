<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\General\Category\CategoryService;
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
     * HomeController constructor.
     * @param SettingService $settingService
     * @param CategoryService $categoryService
     */
    public function __construct(
        SettingService $settingService,
        CategoryService $categoryService
    )
    {
        $this->settingService = $settingService;
        $this->categoryService = $categoryService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(){
        $setting = $this->settingService->all();
        $categories = $this->categoryService->query()->where('status' , true)->whereNull('parent_id')->get();

        return view('front.home.index', compact('setting', 'categories'));
    }
}
