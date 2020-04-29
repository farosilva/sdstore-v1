<?php

namespace App\Listeners\Cart;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Stock;
use App\Http\Controllers\SessionController;

class CartAdd
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
        $session = new SessionController();

        $stock = Stock::find($product['item']->id);
        $stock->in_cart = $session->sumProductCart($product['item']->id) + $product['last_qty'];
        $stock->save();

    }
}
