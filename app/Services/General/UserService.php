<?php


namespace App\Services\General;


use App\Services\BaseService;
use App\User;

class UserService extends BaseService
{
    public function model()
    {
        return User::class;
    }
}
