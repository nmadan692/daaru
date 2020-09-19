<?php


namespace App\Services\General\DefaultProfile;


use App\Services\General\City\CityService;
use Illuminate\Support\Facades\Cache;

class DefaultProfileService
{
    /**
     * @var CityService
     */
    private $cityService;

    /**
     * DefaultProfileService constructor.
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * @param $id
     * @return string
     */
    public function getKey() {
            return 'city';
    }

    public function get($attribute = null) {
        if(Cache::has($this->getKey())) {
            if($attribute) {
                return Cache::get($this->getKey())->{$attribute};
            }
            return Cache::get($this->getKey());
        }
        else {
            $this->defaultCity();
            $this->get($attribute);
        }
    }

    public function defaultCity() {
        Cache::forever($this->getKey(), $this->cityService->all()[0]);
    }

    public function set($city) {
        $this->clear();
        Cache::forever($this->getKey(), $city);

        return $city;
    }

    public function clear() {
        return Cache::forget($this->getKey());
    }
}
