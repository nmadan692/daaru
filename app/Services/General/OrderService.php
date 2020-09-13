<?php


namespace App\Services\General;


use App\Entities\Order;
use App\Services\BaseService;

class OrderService extends BaseService
{
    public function model()
    {
        return Order::class;
    }
}
