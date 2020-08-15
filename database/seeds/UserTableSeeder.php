<?php

use App\Daaruu\Constants\RoleConstant;
use App\Services\General\UserService;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserTableSeeder constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id' => RoleConstant::ADMIN_ID,
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'first_name' => 'Admin',

            ],
            [
                'role_id' => RoleConstant::STAFF_ID,
                'first_name' => 'Staff',
                'last_name' => 'Staff',
                'email' => 'staff@staff.com',
                'password' => bcrypt('password'),
            ],
            [
            'role_id' => RoleConstant::CUSTOMER_ID,
            'first_name' => 'Customer',
            'last_name' => 'Customer',
            'email' => 'customer@customer.com',
            'password' => bcrypt('password'),
            ]
        ];

        foreach ($users as $user) {
            $this->userService->updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
