<?php

namespace App\Http\Controllers\DefaultCity;

use App\Http\Controllers\Controller;
use App\Services\General\City\CityService;
use App\Services\General\DefaultCity\DefaultCityService;
use Illuminate\Http\Request;

class DefaultCityController extends Controller
{
    /**
     * @var DefaultCityService
     */
    private $defaultCityService;
    /**
     * @var CityService
     */
    private $cityService;

    /**
     * DefaultProfileController constructor.
     * @param DefaultCityService $defaultProfileService
     * @param CityService $cityService
     */
    public function __construct(
        DefaultCityService $defaultCityService,
        CityService $cityService
    )
    {
        $this->defaultCityService = $defaultCityService;
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change($id)
    {
        $city = $this->cityService->findOrFail(decrypt($id));
        $this->defaultCityService->set($city);

        return redirect()->route('home');
    }
}
