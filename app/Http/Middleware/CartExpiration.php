<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartExpiration
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
        if ($request->session()->has('app.cart.expiration_at')) {
            if($request->session()->get('app.cart.expiration_at') < now()->format('d/m/Y H:i:s')){
                Cart::destroy();
                $request->session()->forget('app.cart.expiration_at');
                $request->session()->forget('app.cart.created_at');
                $request->session()->forget('app.checkout');
                return redirect()->route('cart')->with('cart_expiration', true);
            }
        }
        return $next($request);
    }
}
