<?php

use App\Services\General\Setting\SettingService;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * @var SettingService
     */
    private $settingService;

    /**
     * SettingTableSeeder constructor.
     * @param SettingService $settingService
     */
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'name' => 'Daaruu dot com',
                'address' => 'Biratnagar',
                'phone' => '9862078434',
                'email' => 'prajwalpoudel2002@gmail.com',
                'viber' => '9862078434',
                'delivery_start_hour' => '9:00 A.M',
                'delivery_end_hour' => '5:30 P.M',
                'facebook' => 'www.facebook.com',
                'instagram' => 'www.instagram.com',
                'twitter' => 'www.twitter.com',
                'city_id' => 1
            ],
            [
                'name' => 'Daaruu dot com',
                'address' => 'Dharan',
                'phone' => '9862078434',
                'email' => 'prajwalpoudel2002@gmail.com',
                'viber' => '9862078434',
                'delivery_start_hour' => '9:00 A.M',
                'delivery_end_hour' => '5:30 P.M',
                'facebook' => 'www.facebook.com',
                'instagram' => 'www.instagram.com',
                'twitter' => 'www.twitter.com',
                'city_id' => 2
            ],
        ];
        foreach ($settings as $setting) {
            $this->settingService->updateOrCreate(['city_id' => $setting['city_id']], $setting);
        }
    }
}
