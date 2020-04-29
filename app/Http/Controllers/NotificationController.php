<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentInfo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Mail\MessageFromClient;

use Illuminate\Support\Facades\Http;
use App\Notifications\StatusPaymentClient;
use App\Notifications\StatusPaymentNotify;
use App\Notifications\ClientMessage;

class NotificationController extends Controller
{
    public function pagSeguroxXx(Request $request)
    {
        $params['email'] = env('PAGSEGURO_EMAIL');
        $params['token'] = env('PAGSEGURO_TOKEN');

        $response = Http::get(env('PAGSEGURO_URL').'/v3/transactions/notifications/'.$request->notificationCode,
            $params
        );

        $notification = json_decode(json_encode(simplexml_load_string($response->body())) ,true);

        $order = Order::find((int)preg_replace('/[^0-9]/', '', $notification['reference']));

        (new OrderController())->changeStatus($notification);
    }

    public function pagSegurox(Request $request)
    {
        $params['email'] = env('PAGSEGURO_EMAIL');
        $params['token'] = env('PAGSEGURO_TOKEN');

        try {
            //code...
            $response = Http::get(env('PAGSEGURO_URL').'/v3/transactions/notifications/'.$request->notificationCode,
                $params
            );
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([], 501);
        }

        $notification = json_decode(json_encode(simplexml_load_string($response->body())) ,true);

        // return strlen();

        $order = Order::find((int)preg_replace('/[^0-9]/', '', $notification['reference']));

        (new OrderController())->changeStatus($notification);

        $payment = PaymentInfo::where('notification_code', $request->notificationCode)->first();

        if(empty($payment)){
            try {
                $aux = PaymentInfo::create([
                    'transaction_code' => $order->payment->transaction_code,
                    'notification_code' => $request->notificationCode,
                    'notification_date' => date('Y-m-d H:i:s', strtotime($notification['lastEventDate'])),
                    'payment_link' => ($notification['paymentLink']) ? $notification['paymentLink'] : null,
                    'payment_validity' => null,
                    'status' => $notification['status'],
                ]);
                return response()->json(['status' => 'Inserido'], 203);
            } catch (\Throwable $th) {
                return response()->json(['status' => $th->getMessage()], 201);
            }
        }else{
            return response()->json(['status' => 'Notificação'], 202);
        }

        // try {
        //     $order->payment->infos()->updateOrCreate([
        //         'notification_code' => $request->notificationCode,
        //         'notification_date' => date('Y-m-d H:i:s', strtotime($notification['lastEventDate'])),
        //         'payment_link' => ($notification['paymentLink']) ? $notification['paymentLink'] : null,
        //         'payment_validity' => null,
        //         'status' => $notification['status'],
        //     ]);
        // } catch (\Throwable $th) {
        //     return response()->json([], 201);
        // }

        // try {
        //     $payment = PaymentInfo::where([
        //         ['transaction_code', $order->payment->transaction_code],
        //         ['notification_code', $request->notificationCode],
        //     ])->first();

        //     $payment->notify(new StatusPaymentClient());
        // } catch (\Throwable $th) {
        //     return response()->json([], 202);
        // }

        // $payment = $order->payment->infos()->updateOrCreate([
        //     'notification_code' => $request->notificationCode,
        //     'notification_date' => date('Y-m-d H:i:s', strtotime($notification['lastEventDate'])),
        //     'payment_link' => ($notification['paymentLink']) ? $notification['paymentLink'] : null,
        //     'payment_validity' => null,
        //     'status' => $notification['status'],
        // ]);

        // return response()->json([$payment], 200);

        // $data = [
        //     'transaction_code' => $order->payment->transaction_code,
        //     'notification_code' => $request->notificationCode,
        //     'notification_date' => date('Y-m-d H:i:s', strtotime($notification['lastEventDate'])),
        //     'payment_link' => ($notification['paymentLink']) ? $notification['paymentLink'] : null,
        //     'payment_validity' => null,
        //     'status' => $notification['status']
        // ];

        // return $data;
    }

    public function pagSeguro3(Request $request)
    {
        $params['email'] = env('PAGSEGURO_EMAIL');
        $params['token'] = env('PAGSEGURO_TOKEN');

        $response = Http::get(env('PAGSEGURO_URL').'/v3/transactions/notifications/'.$request->notificationCode,
            $params
        );

        return $notification = json_decode(json_encode(simplexml_load_string($response->body())) ,true);

        $order = Order::find((int)preg_replace('/[^0-9]/', '', $notification['reference']));

        (new OrderController())->changeStatus($notification);

        $payment = PaymentInfo::where('notification_code', $request->notificationCode)->first();

        if(empty($payment)){
            $payment = PaymentInfo::create([
                'transaction_code' => $order->payment->transaction_code,
                'notification_code' => $request->notificationCode,
                'notification_date' => date('Y-m-d H:i:s', strtotime($notification['lastEventDate'])),
                'payment_link' => ($notification['paymentLink']) ? $notification['paymentLink'] : null,
                'payment_validity' => null,
                'status' => $notification['status']
            ]);
        }

        $payment->notify(new StatusPaymentClient());
        // return response()->json($payment, 200);

        // $payment = PaymentInfo::firstOrNew(
        //     ['transaction_code'  => $order->payment->transaction_code],
        //     ['notification_code' => $request->notificationCode],
        //     // ['notification_date' => date('Y-m-d H:i:s', strtotime($notification['lastEventDate']))],
        //     // ['payment_link'      => ($notification['paymentLink']) ? $notification['paymentLink'] : null],
        //     // ['payment_validity'  => null],
        //     // ['status'            => $notification['status']],
        // );

        // dd($payment);
    }

    public function pagSeguro(Request $request)
    {
        $params['email'] = env('PAGSEGURO_EMAIL');
        $params['token'] = env('PAGSEGURO_TOKEN');

        $response = Http::get(env('PAGSEGURO_URL').'/v3/transactions/notifications/'.$request->notificationCode,
            $params
        );

        $notification = json_decode(json_encode(simplexml_load_string($response->body())) ,true);

        $order = Order::find((int)preg_replace('/[^0-9]/', '', $notification['reference']));

        $payment = PaymentInfo::updateOrCreate([
            'transaction_code'  => $order->payment->transaction_code,
            'notification_code' => str_replace('-','',$request->notificationCode),
            'notification_date' => date('Y-m-d H:i:s', strtotime($notification['lastEventDate'])),
            'payment_link'      => ($notification['paymentLink']) ? $notification['paymentLink'] : null,
            'payment_validity'  => null,
            'status'            => $notification['status'],
        ]);

        (new OrderController())->changeStatus($notification);

        $payment->notify(new StatusPaymentClient());
    }

    public function xpagSeguro()
    {
        $file = json_decode(Storage::get('notifications.txt'), true);

        $request = request()->input();

        $request = Arr::add($file, now()->format('d/m/Y H:i:s'), $request);

        Storage::put('notifications.txt', collect($request));
    }

    public function seePagSeguro(){
        return json_decode(Storage::get('notifications.txt'), true);
    }

    public function clientMessage(Request $request)
    {
        $inputs = $request->validate(
            [
                'contact_name'      => 'required',
                'contact_phone'     => 'required|between:14,15',
                'contact_email'     => 'required|email',
                'contact_mensagem'  => 'required',
            ],
            [
                'required'          => 'Campo obrigatório',
                'between'           => 'Deve ter entre :min e :max caracteres',
                'email'             => 'Deve ser um endereço de e-mail válido',
            ]
        );

        $mail = Mail::to(explode(',', env('APP_MAIL_MESSAGE_CLIENTS')))
            ->bcc(explode(',', env('APP_MAIL_ADMIN')))
            ->send(new MessageFromClient(request()->input()));

        return back()->with('success_message', 'Mensagem enviada com sucesso');
    }
}
