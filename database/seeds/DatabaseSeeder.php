<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuGroupTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EmailTemplateTableSeeder::class);
        $this->call(CityTableSeeder::class);
//        $this->call(ProductSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
}
