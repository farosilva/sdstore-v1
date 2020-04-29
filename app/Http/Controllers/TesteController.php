<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Payment;
use App\Models\PaymentInfo;
use App\Models\ProductPrice;
use App\Models\ProductVariant;
use App\Models\ProductAttribute;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class TesteController extends Controller
{
    public function teste()
    {
        return dd(auth('admin')->user());

        // $order = Order::find(13);
        // $notification = cache('pagseguro_notify');

        // $transaction_code = $order->payment->transaction_code;

        // $payment = PaymentInfo::updateOrCreate([
        //     'transaction_code'  => $transaction_code,
        //     'notification_code' => $notification['code'],
        //     'notification_date' => date('Y-m-d H:i:s', strtotime($notification['lastEventDate'])),
        //     'payment_link'      => ($notification['paymentLink']) ? $notification['paymentLink'] : null,
        //     'payment_validity'  => null,
        //     'status'            => $notification['status'],
        // ]);

        // return PaymentInfo::where('transaction_code', $transaction_code)->get();

        // // $old = $order->payment->infos->last();
        // // $new = $order->payment->infos->last()->updateOrCreate(
        // //     ['status' => '2']
        // // );

        // return [
        //     'old'   => $old,
        //     // 'new'   => $new,
        // ];
    }
}
