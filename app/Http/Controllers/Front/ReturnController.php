<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\General\CmsPage\CmsPageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReturnController extends Controller
{
    /**
     * @var CmsPageService
     */
    private $cmsPageService;

    /**
     * PrivacyController constructor.
     * @param CmsPageService $cmsPageService
     */
    public function __construct(
        CmsPageService $cmsPageService
    )
    {
        $this->cmsPageService = $cmsPageService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(){
        $cms_page = $this->cmsPageService->all();
        return view('front.cms.return', compact('cms_page'));
    }
}
