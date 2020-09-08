<?php

namespace App\Http\Controllers\Front;

use App\Daaruu\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Services\General\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function index(){
        return view('front.checkout.checkout');
    }

    public function store(Request $request) {
//        dd($request->all());
        $userData[] =  [
            'first_name' => $request->input('first_name')[0],
            'last_name' => $request->input('last_name')[0],
            'address1' => $request->input('address1')[0],
            'address2' => $request->input('address2')[0],
            'phone' => $request->input('phone')[0],
            'email' => $request->input('email')[0],
            'city' => $request->input('city')[0],
            'account_created' => false,
            'role_id' => RoleConstant::CUSTOMER_ID
        ];
        if($request->input('create_account') == 'on') {
            $userData[0] = array_merge(
                $userData[0],
                [
                    'account_created' => true,
                    'password' => bcrypt($request->input('password'))
                ]
            );
            if($request->input('different_shipping') == 'on') {
                $userData[] = [
                    'first_name' => $request->input('first_name')[1],
                    'last_name' => $request->input('last_name')[1],
                    'address1' => $request->input('address1')[1],
                    'address2' => $request->input('address2')[1],
                    'phone' => $request->input('phone')[1],
                    'email' => $request->input('email')[1],
                    'city' => $request->input('city')[0],
                    'account_created' => false,
                    'password' => bcrypt(Str::random(12)),
                    'role_id' => RoleConstant::CUSTOMER_ID
                ];
            }
        }

        foreach ($userData as $user) {
            $this->userService->create($user);
        }

        return redirect()->back();

    }
}
