<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Stock;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\DB;

class StockInCartValidation
{
    public function handle($request, Closure $next)
    {
        if($request->session()->has('app.cart.validation_at') == false){
            $request->session()->put('app.cart.validation_at', now()->format('d/m/Y H:i:s'));

            $session = new SessionController();
            $products = $session->sumProductsCart();

            DB::table('stocks')->update(['in_cart' => 0]);

            if(isset($products)){
                foreach ($products as $key => $value) {
                    $stock = Stock::find($key);
                    $stock->in_cart = (int)($value) ?? 0;
                    $stock->save();
                }
            }
        }
        return $next($request);
    }
}
