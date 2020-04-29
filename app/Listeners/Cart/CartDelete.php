<?php

namespace App\Listeners\Cart;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Stock;
use App\Http\Controllers\SessionController;

class CartDelete
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
    public function handle($product)
    {
        $quantity = (int)$product->qty;

        $stock = Stock::find($product->id);
        $stock->in_cart = (($stock->in_cart - $quantity) < 0) ? 0 : $stock->in_cart - $quantity;
        $stock->save();
    }
}
