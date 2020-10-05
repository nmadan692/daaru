<?php

namespace App\Http\Controllers\Front;

use App\Daaruu\Constants\OrderConstant;
use App\Daaruu\Constants\RoleConstant;
use App\Events\Front\OrderBooked;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CheckoutRequest;
use App\Jobs\SendCustomerInvoice;
use App\Services\General\DefaultCity\DefaultCityService;
use App\Services\General\Product\ProductService;
use App\Services\General\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
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
     * @var DefaultCityService
     */
    private $defaultCityService;
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * CheckoutController constructor.
     * @param UserService $userService
     * @param DefaultCityService $defaultCityService
     * @param ProductService $productService
     */
    public function __construct(
        UserService $userService,
        DefaultCityService $defaultCityService,
        ProductService $productService
    )
    {
        $this->userService = $userService;
        $this->defaultCityService = $defaultCityService;
        $this->productService = $productService;
    }

    /**
     * @return Factory|View
     */
    public function index(){
        $products = session()->get('cart-'.defaultCity('id')) ?? collect([]);

        return view('front.checkout.checkout', compact('products'));
    }

    /**
     * @return Application|Factory|View
     */
    public function invoice(){
        return view('front.checkout.invoice');
    }

    /**
     * @return Application|Factory|View
     */
    public function profile(){

        return view('front.checkout.profile');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CheckoutRequest $request) {
        if(!authenticated('customer')) {
            $storeData = array_merge(
                $request->all(),
                [
                    'account_created' => true,
                    'role_id' => RoleConstant::CUSTOMER_ID,
                    'password' => bcrypt($request->input('password'))
                ]
            );
        }
        DB::beginTransaction();
            if(!authenticated('customer')) {
                $customer = $this->userService->create($storeData);
                $this->guard()->login($customer);
            }
            else {
                $customer = me('customer');
            }
            $ordersData = [
                'status' => OrderConstant::ORDERED_ID,
                'city_id' => $this->defaultCityService->get('id')
            ];
            $order = $customer->orders()->create($ordersData);
            $this->dispatch(new SendCustomerInvoice($order, $customer));
            if(session()->get('cart-'.defaultCity('id'))) {
                foreach (session()->get('cart-'.defaultCity('id')) as $product) {
                    $order->products()->attach(
                        $product['product']->id,
                        [
                            'quantity' => $product['quantity'],
                            'amount' => $product['quantity'] * $product['product']->discount_amount,
                        ]
                    );
                    $p = $this->productService->findOrFail($product['product']->id);
                    $p->quantity-=$product['quantity'];
                    if($p->quantity<0) {
                        $error = \Illuminate\Validation\ValidationException::withMessages([
                            'out_of_stock' => $p->name.' is out of stock.'
                                ]
                        );
                        throw $error;
                    }
                    $p->save();
                }
            }
            session()->forget('cart-'.defaultCity('id'));
        DB::commit();
        $request->session()->flash('message', 'Order Placed Successfully');

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
