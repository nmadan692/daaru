<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\General\OrderService;
use App\Services\General\Setting\SettingService;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyOrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $orderService;
    /**
     * @var SettingService
     */
    private $settingService;

    /**
     * MyOrderController constructor.
     * @param OrderService $orderService
     * @param SettingService $settingService
     */
    public function __construct(
        OrderService $orderService,
        SettingService $settingService
    )
    {
        $this->orderService = $orderService;
        $this->settingService = $settingService;
    }

    /**
     * @return Factory|View
     */
    public function index() {
        $orders = $this->orderService->query()->where('user_id', frontUser('id'))->with('products', 'city')->paginate(4);

        return view('front.order.index', compact('orders'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function viewInvoice($id) {
        $order =  $this->orderService->findOrFail(decrypt($id))->load('products');
        $setting = $this->settingService->getWhere([['city_id', $order->city_id]]);

        $user = me('customer');

        return view('front.order.invoice', compact('order', 'user', 'setting'));
    }

    /**
     * @param $id
     * @return mixed
     */
//    public function downloadInvoice($id) {
//        $order =  $this->orderService->findOrFail(decrypt($id))->load('products');
//        $user = me('customer');
//
//        $pdf = PDF::loadView('front.order.invoice', ['order' =>$order, 'user' => $user]);
//        return $pdf->download('a.pdf');
//    }

    /**
     * @return Factory|View
     */
    public function invoice() {
        return view('front.order.invoice');
    }


}
