<?php


namespace App\Services\General\Setting;


use App\Entities\Setting;
use App\Services\BaseService;

class SettingService extends BaseService
{
    public function model()
    {
        return Setting::class;
    }

}
