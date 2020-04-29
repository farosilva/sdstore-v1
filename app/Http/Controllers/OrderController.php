<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Stock;
use App\Models\Payment;

use App\Notifications\StatusPaymentClient;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified')->except(['avaiables', 'pendings', 'delivering', 'showOrder']);
    }

    public function index()
    {
        return view('account.orders.orders');
    }

    public function show($id)
    {
        $order = Order::where([
            ['order_ref', $id],
            ['user_id', auth()->user()->user_id],
        ])->first();

        if($order){
            return view('account.orders.order', ['order' => $order]);
        }

        return redirect()->route('my-account.orders');

    }

    public function showOrder($id)
    {
        $order = Order::where([
            ['order_ref', $id],
        ])->first();

        if($order){
            return view('account.orders.order', ['order' => $order, 'admin' => true]);
        }

        return redirect()->back();
    }

    public function avaiables()
    {
        $orders = Order::where([
            ['status', 'P']
        ])->orderBy('created_at')->paginate(10);
        return view('admin.orders-available', ['orders' => $orders]);
    }
    public function pendings()
    {
        $orders = Order::where([
            ['status', 'A']
        ])->orderBy('created_at')->paginate(10);
        return view('admin.orders-pending', ['orders' => $orders]);
    }

    public function delivering()
    {
        $inputs = collect(request()->except('_token'))->keys();

        $orders = Order::whereIn('order_ref', $inputs)->where('status', 'P')->get();

        if($orders->count() > 0){
            foreach ($orders as $order) {
                $order->status = 'F';
                $order->save();

                $payment = $order->payment->infos->last();
                $payment->notify(new StatusPaymentClient());
            }

            $message = ($orders->count() > 1) ? 'Pedidos finalizados' : 'Pedido finalizado';
            return back()->with('message', $message);
        }else{
            return back();
        }
    }

    public function storeOrder()
    {
        $cart = (new CartController())->cart();

        $order = Order::create([
            'user_id'       => auth()->user()->user_id,
            'address_id'    => request()->session()->get('app.checkout.address.delivery'),
            'invoice_id'    => (request()->session()->get('app.checkout.address.invoice')) ?? request()->session()->get('app.checkout.address.delivery'),
            'order_date'    => now()->format('Y-m-d'),
            'delivery_date' => now()->format('Y-m-d'),
            'value'         => (float)str_replace(',','.',$cart['resume']['subtotal']),
            'discount'      => 0.00,
            'taxes'         => 0.00,
            'shipping'      => (float)number_format(request()->session()->get('app.cart.shipping'), 2, '.', ','),
            'ip_address'    => request()->server('REMOTE_ADDR'),
            'comments'      => request()->session()->get('app.checkout.observation'),
        ]);

        $counter = 0;
        foreach ($cart['items'] as $item) {
            $order->items()->create([
                'sku'           => $item->id,
                'item'          => ++$counter,
                'quantity'      => $item->qty,
                'price_orig'    => $item->model->current_price,
                'price_sale'    => $item->price,
                'subtotal'      => $item->price * $item->qty,
                'discount'      => ($item->model->current_price - $item->price) * $item->qty,
                'taxes'         => 0.00,
            ]);
            Stock::find($item->id)->decrement('quantity', $item->qty);
        }

        (new CartController())->destroyCart();

        request()->session()->forget('app.checkout');

        return $order;
    }

    public function getLastOrder()
    {
        return (auth()->user()->orders->last()->order_id) ?? 0;
    }

    public function changeStatus($notification)
    {
        if($notification['status'] == 7){
            $order = Order::find((int)preg_replace('/[^0-9]/', '', $notification['reference']));
            $order->status = "C";
            $order->save();

            foreach ($order->items as $item) {
                $item->product->stocks()->increment('quantity', $item->quantity);
            }
        }

        if($notification['status'] == 3){
            $order = Order::find((int)preg_replace('/[^0-9]/', '', $notification['reference']));
            $order->status = "P";
            $order->save();
        }
    }

}
