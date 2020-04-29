<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\ProductVariant;

class CartController extends Controller
{
    protected $sku;
    protected $quantity;

    public function __construct()
    {
        $this->sku = request()->sku;
        $this->quantity = (request()->quantity) ?? 1;
    }

    public function index()
    {
        if(request()->session()->has('cart_expiration')){
            return view('cart.expiration');
        }
        return view('cart.index', $this->cart());
    }

    public function expirate()
    {
        if(request()->session()->has('cart_expiration')){
            return view('cart.expiration');
        }

        return redirect()->route('cart');
    }

    public function addItem()
    {
        $result = $this->verifyProduct();

        if($result->getOriginalContent()['success']){
            $product = ProductVariant::find($this->sku);

            $item = collect([
                'sku'           => $this->sku,
                'name_alt'      => $product->products->name.' '.$product->infos->weight.$product->infos->unit,
                'quantity'      => $this->quantity,
                'price'         => $product->current_price,
                'weight'        => $product->infos->weight,
                'infos'         => [
                    'image'     => $product->default_image,
                    'name'      => $product->name,
                ]
            ]);

            if(request()->session()->has('cart.default') == false){
                request()->session()->put('app.cart.shipping', 0);
                request()->session()->put('app.cart.created_at', now()->format('d/m/Y H:i:s'));
                request()->session()->put('app.cart.expiration_at', now()->addMinutes(30)->format('d/m/Y H:i:s'));
            }

            $cart = Cart::add($item['sku'], $item['name_alt'], $item['quantity'], $item['price'], $item['weight'], $item['infos'])->associate('App\Models\ProductVariant');

            return back()->with('cart.success', 'Adicionado com sucesso');
        }else{
            return back()->withErrors(['cart.error' => $result->getOriginalContent()['message']]);
        }
    }

    public function updateItem()
    {
        $quantity = (int)$this->quantity;
        $cart = Cart::get(request()->rowId);
        $this->quantity = $quantity - $cart->qty;

        if($this->quantity > 0){
            $result = $this->verifyProduct();
            if($result->getOriginalContent()['success']){
                Cart::update(request()->rowId, request()->quantity);
                return back()->with('cart.success', 'Atualizado com sucesso');
            }else{
                return back()->withErrors(['cart.error' => $result->getOriginalContent()['message']]);
            }
        }else{
            Cart::update(request()->rowId, request()->quantity);
            return back()->with('cart.success', 'Atualizado com sucesso');
        }






















        // Cart::update($request->rowId, $request->quantity);
        // return back();
    }

    public function deleteItem(Request $request)
    {
        Cart::remove($request->rowId);
        return back();
    }

    public function destroyCart(){
        Cart::destroy();
    }

    public function verifyProduct()
    {
        $product = ProductVariant::active()->find($this->sku);

        if($product){
            if($product->stocks->avaiable and $product->stocks->quantity_avaiable >= $this->quantity){
                return response()->json([
                    'success'   => true,
                    'message'   => 'Produto disponível'
                ], 200);
            }else{
                return response()->json([
                    'success'   => false,
                    'message'   => 'Produto sem saldo disponível'
                ], 403);
            }
        }else{
            return response()->json([
                'success'   => false,
                'message'   => 'Produto indisponível no momento'
            ], 404);
        }
    }

    public function cart()
    {
        return [
            'items'     => Cart::content(),
            'resume'    => collect([
                'num_items'         => Cart::count(),
                'num_products'      => Cart::content()->count(),
                'frete'             => (Cart::count() > 0) ? (string)number_format(str_replace(',','.',request()->session()->get('app.cart.shipping')), 2, ',', '.') : '0,00',
                'subtotal'          => Cart::subtotal(),
                'total'             => (string)number_format((float)str_replace(',','.',Cart::subtotal()) + request()->session()->get('app.cart.shipping'), 2,',','.')
            ])
        ];
    }

    public function products()
    {
        $cart = Cart::content();
        $products = [];

        foreach ($cart as $item) {
            $products[$item->id] = (int)$item->qty;
        }

        return $products;
    }

    public function expirationTime()
    {
        if(request()->session()->has('app.cart.expiration_at')){
            $expiration_at = request()->session()->get('app.cart.expiration_at');
            $carbon = Carbon::createFromFormat('d/m/Y H:i:s', $expiration_at);
            return $carbon->diffInSeconds(now());
        }else{
            return 0;
        }
    }
}
