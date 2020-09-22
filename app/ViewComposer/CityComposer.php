<?php


namespace App\ViewComposer;


use App\Services\General\City\CityService;
use Illuminate\View\View;

class CityComposer
{
    /**
     * @var CityService
     */
    private $cityService;

    /**
     * CityComposer constructor.
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * @param View $view
     */
    public function compose(View $view) {
        $cities = $this->cityService->all();

        $view->with(compact('cities'));

    }
}
