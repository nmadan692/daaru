<?php


namespace App\ViewComposer;


use App\Services\General\Setting\SettingService;
use Illuminate\View\View;

class SettingComposer
{
    /**
     * @var SettingService
     */
    private $settingService;

    /**
     * SettingComposer constructor.
     * @param SettingService $settingService
     */
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * @param View $view
     */
    public function compose(View $view) {
        $setting = $this->settingService->firstOrFail();

        $view->with(compact('setting'));

    }

}
