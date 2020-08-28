<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
     * HomeController constructor.
     * @param SettingService $settingService
     */
    public function __construct(
        SettingService $settingService
    )
    {
        $this->settingService = $settingService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(){
        $setting = $this->settingService->all();
        return view('front.home.index', compact('setting'));
    }
}
