<?php

namespace App\Http\Controllers\Front;

use App\Daaruu\Constants\OrderConstant;
use App\Daaruu\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Services\General\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * CheckoutController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return Factory|View
     */
    public function index(){
        $products = session()->get('cart') ?? collect([]);

        return view('front.checkout.checkout', compact('products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function store(Request $request) {
//        $userData[] =  [
//            'first_name' => $request->input('first_name')[0],
//            'last_name' => $request->input('last_name')[0],
//            'address1' => $request->input('address1')[0],
//            'address2' => $request->input('address2')[0],
//            'phone' => $request->input('phone')[0],
//            'email' => $request->input('email')[0],
//            'city' => $request->input('city')[0],
//            'account_created' => false,
//            'role_id' => RoleConstant::CUSTOMER_ID
//        ];
//        if($request->input('create_account') == 'on') {
//            $userData[0] = array_merge(
//                $userData[0],
//                [
//                    'account_created' => true,
//                    'password' => bcrypt($request->input('password'))
//                ]
//            );
//            if($request->input('different_shipping') == 'on') {
//                $userData[] = [
//                    'first_name' => $request->input('first_name')[1],
//                    'last_name' => $request->input('last_name')[1],
//                    'address1' => $request->input('address1')[1],
//                    'address2' => $request->input('address2')[1],
//                    'phone' => $request->input('phone')[1],
//                    'email' => $request->input('email')[1],
//                    'city' => $request->input('city')[0],
//                    'account_created' => false,
//                    'password' => bcrypt(Str::random(12)),
//                    'role_id' => RoleConstant::CUSTOMER_ID
//                ];
//            }
//        }
//
//        DB::beginTransaction();
//        foreach ($userData as $key => $user) {
//            $u[$key] = $this->userService->create($user);
//        }
//        $ordersData = [
//            'status' => OrderConstant::ORDERED_ID,
//        ];
//        if(isset($u[1])) {
//            $ordersData = [
//                array_merge(
//                    $ordersData,
//                    [
//                        'ordered_by' => $u[0]->id,
//                    ]
//                )
//            ];
//            $order = $u[1]->orders()->create($ordersData);
//        }
//        else {
//            $order = $u[0]->orders()->create($ordersData);
//        }
//        foreach (session()->get('cart') as $product) {
//            $order->products()->attach(
//                $product['product']->id,
//                [
//                    'quantity' => $product['quantity'],
//                    'amount' => $product['quantity']*$product['product']->discount_amount,
//                ]
//            );
//        }
//        session()->forget('cart');
//        DB::commit();
//
//        return redirect()->route('products');
//
//    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $storeData = array_merge(
            $request->all(),
            [
                'account_created' => true,
                'role_id' => RoleConstant::CUSTOMER_ID,
                'password' => bcrypt($request->input('password'))
            ]
        );
        DB::beginTransaction();
            $customer = $this->userService->create($storeData);
            $this->guard()->login($customer);
            $ordersData = [
                'status' => OrderConstant::ORDERED_ID,
            ];
            $order = $customer->orders()->create($ordersData);
            if(session()->get('cart')) {
                foreach (session()->get('cart') as $product) {
                    $order->products()->attach(
                        $product['product']->id,
                        [
                            'quantity' => $product['quantity'],
                            'amount' => $product['quantity'] * $product['product']->discount_amount,
                        ]
                    );
                }
            }
            session()->forget('cart');
        DB::commit();

        return response()->json(['message' => 'Successfully Placed Ordered.']);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }
}
