<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\General\Product\ProductService;
use Illuminate\Http\Request;
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

    public function index(Request $request) {

        $products = session()->get('cart');

        return view('front.cart.index', compact('products'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function shop($id, Request $request) {
        if($request['action'] == 'cart') {
            $this->addToCart(decrypt($id), $request);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        elseif($request['action'] == 'wishList') {
            $this->addToWishList(decrypt($id), $request);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function addToCart($id, Request $request) {
        $product = $this->productService->findOrFail($id);
        $carts = $request->session()->get('cart');

        if(!$carts) {
            $carts = [
                $id => [
                    'product' => $product,
                    'quantity' => $request->quantity,
                ]
            ];

            $request->session()->put('cart', $carts);
        }
        else {
            if(isset($carts[$id])) {
                $carts[$id]['quantity'] = $carts[$id]['quantity'] + $request->quantity;

                $request->session()->put('cart', $carts);
            }
            else {
                $carts[$id] = [
                    'product' => $product,
                    'quantity' => $request->quantity,
                ];

                $request->session()->put('cart', $carts);
            }
        }

        return;
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public  function addToWishList($id, Request $request) {
        $product = $this->productService->findOrFail($id);
        $lists = $request->session()->get('list');

        if(!$lists) {
            $lists = [
                $id => [
                    'product' => $product,
                    'quantity' => $request->quantity,
                ]
            ];

            $request->session()->put('list', $lists);
        }
        else {
            if(isset($lists[$id])) {
                $lists[$id]['quantity'] = $lists[$id]['quantity'] + $request->quantity;

                $request->session()->put('list', $lists);
            }
            else {
                $lists[$id] = [
                    'product' => $product,
                    'quantity' => $request->quantity,
                ];

                $request->session()->put('list', $lists);
            }
        }

        return;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCart($id) {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);

        return response()->json(['message' => 'Successfully deleted cart.']);
    }
}
