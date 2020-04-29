<?php

namespace App\Listeners\Cart;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Stock;
use App\Http\Controllers\CartController;

class CartDestroy
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($cart)
    {
        $cart = new CartController();
        $products = collect($cart->products());

        if($products->count()){
            foreach ($products as $key => $value) {
                $stock = Stock::find($key);

                $stock->in_cart = $stock->in_cart - ($value) ?? 0;
                $stock->save();
            }
        }
    }
}
