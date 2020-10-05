<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\General\Product\ProductService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * CartController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function cart(Request $request) {
        $products = session()->get('cart-'.defaultCity('id'));

        return view('front.cart.index', compact('products'));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function wishList(Request $request) {

        $products = session()->get('list-'.defaultCity('id'));

        return view('front.wishList.index', compact('products'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function shop($id, Request $request) {
        if($request['action'] == 'cart') {
            $this->addToCart(decrypt($id), $request);
        }
        elseif($request['action'] == 'wishList') {
            $this->addToWishList(decrypt($id), $request);
        }

        return redirect()->back();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function addToCart($id, Request $request) {
        $product = $this->productService->findOrFail($id);
        $carts = $request->session()->get('cart-'.defaultCity('id'));

        if(!$carts) {
            $carts = [
                $id => [
                    'product' => $product,
                    'quantity' => $request->quantity,
                ]
            ];

            $request->session()->put('cart-'.defaultCity('id'), $carts);
        }
        else {
            if(isset($carts[$id])) {
                $carts[$id]['quantity'] = $carts[$id]['quantity'] + $request->quantity;

                $request->session()->put('cart-'.defaultCity('id'), $carts);
            }
            else {
                $carts[$id] = [
                    'product' => $product,
                    'quantity' => $request->quantity,
                ];

                $request->session()->put('cart-'.defaultCity('id'), $carts);
            }
        }

        $request->session()->flash('message', 'Product added to cart successfully.');

        return;
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function addToWishList($id, Request $request) {
        $product = $this->productService->findOrFail($id);
        $lists = $request->session()->get('list-'.defaultCity('id'));

        if(!$lists) {
            $lists = [
                $id => [
                    'product' => $product,
                    'quantity' => $request->quantity,
                ]
            ];

            $request->session()->put('list-'.defaultCity('id'), $lists);
        }
        else {
            if(isset($lists[$id])) {
                $lists[$id]['quantity'] = $lists[$id]['quantity'] + $request->quantity;

                $request->session()->put('list-'.defaultCity('id'), $lists);
            }
            else {
                $lists[$id] = [
                    'product' => $product,
                    'quantity' => $request->quantity,
                ];

                $request->session()->put('list-'.defaultCity('id'), $lists);
            }
        }
        $request->session()->flash('message', 'Product added to wishlist successfully.');

        return;
    }

    /**
     * @param Request $request
     */
    public function updateCart(Request $request) {
        if(session()->get('cart-'.defaultCity('id'))) {
            \session()->forget('cart-'.defaultCity('id'));
        }

        foreach ($request->all() as $data) {
            $product = $this->productService->findOrFail($data['id']);
            $carts[$data['id']] = [
                    'product' => $product,
                    'quantity' => $data['quantity'],
                ];
        }
        $request->session()->put('cart-'.defaultCity('id'), $carts);

        return response()->json(['message' => 'Successfully Updated Session.']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCart($id) {
        $cart = session()->get('cart-'.defaultCity('id'));
        unset($cart[$id]);
        session()->put('cart-'.defaultCity('id'), $cart);

        return response()->json(['message' => 'Successfully deleted cart.']);
    }
}
