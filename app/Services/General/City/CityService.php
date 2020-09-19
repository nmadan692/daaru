<?php


namespace App\Services\General\City;


use App\Entities\City;
use App\Services\BaseService;

class CityService extends BaseService
{
    public function model()
    {
        return City::class;
    }
}
