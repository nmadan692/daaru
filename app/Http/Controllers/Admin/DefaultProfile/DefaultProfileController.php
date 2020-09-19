<?php

namespace App\Http\Controllers\Admin\DefaultProfile;

use App\Http\Controllers\Controller;
use App\Services\General\City\CityService;
use App\Services\General\DefaultProfile\DefaultProfileService;
use Illuminate\Http\Request;

class DefaultProfileController extends Controller
{
    /**
     * @var DefaultProfileService
     */
    private $defaultProfileService;
    /**
     * @var CityService
     */
    private $cityService;

    /**
     * DefaultProfileController constructor.
     * @param DefaultProfileService $defaultProfileService
     * @param CityService $cityService
     */
    public function __construct(
        DefaultProfileService $defaultProfileService,
        CityService $cityService
    )
    {
        $this->defaultProfileService = $defaultProfileService;
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change($id)
    {
        $city = $this->cityService->findOrFail(encrypt($id));
        $this->defaultProfileService->set($city);

        return redirect()->back();
    }
}
