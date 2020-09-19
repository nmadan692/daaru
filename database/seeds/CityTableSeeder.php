<?php

use App\Services\General\City\CityService;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * @var CityService
     */
    private $cityService;

    /**
     * CityTableSeeder constructor.
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'Biratnagar'
            ],
            [
                'name' => 'Dharan'
            ]

        ];
        foreach ($cities as $city) {
            $this->cityService->updateOrCreate(['name' => $city['name']], $city);
        }
    }
}
