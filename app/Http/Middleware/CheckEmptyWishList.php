<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmptyWishList
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
        if(empty(session()->get('list-'.defaultCity('id')))) {
            $request->session()->flash('message', 'No Products Added to Wishlist.');
            $request->session()->flash('status', 'error');
            return redirect()->back();
        }
        return $next($request);
    }
}
