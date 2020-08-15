<?php

use App\Services\General\RoleService;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * @var RoleService
     */
    private $roleService;

    /**
     * RoleTableSeeder constructor.
     * @param RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin'
            ],
            [
                'name' => 'staff'
            ],
            [
                'name' => 'customer'
            ],

        ];
        foreach ($roles as $role) {
            $this->roleService->updateOrCreate(['name' => $role['name']], $role);
        }
    }
}
