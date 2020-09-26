<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmptyCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(session()->get('cart'))) {
            $request->session()->flash('message', 'No Products Added to Cart.');
            $request->session()->flash('status', 'error');
            return redirect()->back();
        }
        return $next($request);
    }
}
