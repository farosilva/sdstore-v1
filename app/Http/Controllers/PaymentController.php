<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    public function storeDB($transaction)
    {
        $payment = new Payment();

        $payment->payment_type = (string)$transaction->paymentMethod->type;
        $payment->transaction_code = preg_replace('/-/','',$transaction->code);
        $payment->transaction_date = date('Y-m-d H:i:s', strtotime($transaction->date));
        $payment->order_ref = (string)$transaction->reference;
        $payment->save();

        //Atualiza Pedido
        Order::find((int)preg_replace('/[^0-9]/','',$transaction->reference))->update([
            'payment_id'  => $payment->payment_id,
            'order_ref'     => $payment->order_ref,
        ]);
    }
}
