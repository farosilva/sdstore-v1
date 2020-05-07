<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Events\OrderStore;
use App\Notifications\OrderStored;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\AddressRequest;

use Illuminate\Support\Facades\Cache;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified',['checkout' => true]);
    }

    public function index()
    {
        $cart = new CartController();
        $expiration_time = $cart->expirationTime();

        if($cart->cart()['resume']['num_items']){
            // request()->session()->put('app.cart.expiration_at', now()->addMinutes(30)->format('d/m/Y H:i:s'));
            if($expiration_time < 180){
                request()->session()->put('app.cart.expiration_at', now()->addMinutes(5)->format('d/m/Y H:i:s'));
            }

            return $this->validateCheckout();

        }

        return redirect()->route('cart');
    }

    private function validateCheckout()
    {
        //Profile
        if(auth()->user()->contacts->count() == 0){
            return view('checkout.index', ['section' => 'profile']);
        }

        request()->session()->put('app.checkout.validate.profile', true);

        if(!request()->session()->get('app.checkout.validate.profile') or (request()->session()->get('app.checkout.validate.profile') && request()->section == 'profile')){
            return view('checkout.index', ['section' => 'profile']);
        }

        //Address
        if(!request()->session()->get('app.checkout.validate.address') or (request()->session()->get('app.checkout.validate.address') && request()->section == 'address') or request()->new_address){
            if (request()->new_address or auth()->user()->addresses->count() == 0) {
                return view('checkout.index', ['section' => 'address', 'new_address' => true]);
            }

            return view('checkout.index', ['section' => 'address']);
        }

        //Delivery
        if(request()->select_delivery){
            request()->session()->put('app.checkout.validate.delivery', true);
            request()->session()->put('app.checkout.observation', request()->observation);
        }

        if(!request()->session()->get('app.checkout.validate.delivery') or (request()->session()->get('app.checkout.validate.delivery') && request()->section == 'delivery')){
            return view('checkout.index', ['section' => 'delivery', 'observation' => request()->session()->get('app.checkout.observation')]);
        }

        //Payment
        if(!request()->session()->get('app.checkout.validate.payment') or (request()->session()->get('app.checkout.validate.payment') && request()->section == 'payment')){
            // $token = "";
            $token = $this->getSessionToken();
            return view('checkout.index', ['section' => 'payment', 'token' => $token]);
        }

        return 'xXx';
    }

    public function contactsStore(ContactRequest $request)
    {
        $contact = new ContactController();
        $contact->storeDB($request);
        return back()->withInput();
    }

    public function addressStore(AddressRequest $request)
    {
        $address = new AddressController();
        $address->storeDB($request);
        return back()->withInput();
    }

    public function addressSelect()
    {
        if(request()->checkout_delivery){
            request()->session()->put('app.checkout.address.delivery', request()->checkout_delivery);
        }

        if(request()->checkout_invoice){
            request()->session()->put('app.checkout.address.invoice', request()->checkout_invoice);
        }

        if(request()->checkout_delivery || request()->checkout_invoice){
            request()->session()->put('app.checkout.validate.address', true);
        }

        return back();
    }


    //PagSeguro Functions
    public function getSessionToken()
    {
        $response = Http::asForm()->post('https://ws.sandbox.pagseguro.uol.com.br/v2/sessions', [
            'email' => 'financeiro@santodomalimentos.com.br',
            'token' => '2BE66A2072354EAD9823B999D0271F96',
        ]);
        $token = (string)simplexml_load_string($response->body())->id;
        return $token;
    }

    public function checkoutBoleto()
    {
        //Monta os parâmetros para a requisição na PagSeguro
        $params = $this->prepareCheckoutBoleto();

        //Salva pedido no banco
        $order = (new OrderController())->storeOrder();

        //Insere parâmetros adicionais para a requisição na PagSeguro
        $params['reference'] = 'STD'.(string)str_pad($order->order_id, 6, 0, STR_PAD_LEFT);
        $params['email'] = env('PAGSEGURO_EMAIL');
        $params['token'] = env('PAGSEGURO_TOKEN');

        //Realiza a requisição na PagSeguro
        $response = Http::asForm()->post(env('PAGSEGURO_URL').'/v2/transactions',
            $params
        );

        //Dados da transação
        $transaction = simplexml_load_string($response->body());

        // Salva os dados da transação no Cache (desenvolvimento apenas)
        Cache::put('http_response', $response);
        Cache::put('http_body', $response->body());
        Cache::put('http_json', $response->json());

        // Grava dados da transação no Banco
        (new PaymentController())->storeDB($transaction);

        // Dispara notificação
        $order->notify(new OrderStored($order, collect(json_decode(json_encode($transaction), true))));

        return redirect()->route('checkout.order')->with([
            'checkout'      => true,
            'order'         => $order,
            'transaction'   => collect(json_decode(json_encode($transaction), true))
        ]);

    }

    private function getItems()
    {
        $cart = Cart::content();
        $counter = 0;
        $item = array();
        foreach ($cart as $product) {
            $counter++;

            $item['itemId'.$counter] = $product->id;
            $item['itemDescription'.$counter] = $product->name;
            $item['itemAmount'.$counter] = (string)number_format($product->price, 2, '.',',');
            $item['itemQuantity'.$counter] = (string)$product->qty;
        }
        return $item;
    }

    private function prepareCheckoutBoleto()
    {
        $address = Address::where([
            ['user_id', auth()->user()->user_id],
            ['address_id', request()->session()->get('app.checkout.address.delivery')]
        ])->first();

        return array_merge([
            'paymentMode' => 'default',
            'paymentMethod' => 'boleto',
            'currency' => 'BRL',
            'extraAmount' => '0.00',
            'notificationURL' => env('APP_URL').'api/notifications/pagseguro',
            'reference' => '',
            'senderName' => auth()->user()->full_name,
            'senderCPF' => str_pad(auth()->user()->cpf_cnpj,11,0,STR_PAD_LEFT),
            'senderAreaCode' => substr(auth()->user()->contacts->first()->phone_1, 0, 2),
            'senderPhone' => substr(auth()->user()->contacts->first()->phone_1, 2, strlen(auth()->user()->contacts->first()->phone_1)),
            // 'senderEmail' => auth()->user()->email,
            'senderEmail' => (env('APP_ENV') == 'local') ? 'comprador.teste@sandbox.pagseguro.com.br' : auth()->user()->email,
            'senderHash' => request()->_hash,
            'shippingAddressRequired' => 'true',
            'shippingAddressStreet' => $address->street_name,
            'shippingAddressNumber' => $address->number,
            'shippingAddressComplement' => is_null($address->complem) ? '' : $address->complem,
            'shippingAddressDistrict' => $address->district,
            'shippingAddressPostalCode' => $address->post_code,
            'shippingAddressCity' => $address->city,
            'shippingAddressState' => $address->state,
            'shippingAddressCountry' => 'BRA',
            'shippingType' => '3',
            'shippingCost' => (string)number_format(request()->session()->get('app.cart.shipping'), 2, '.',','),
        ], $this->getItems());
    }

    private function prepareCheckoutCreditCard()
    {

    }

    public function checkoutOrder(Request $request)
    {

        $data = [
            'checkout'      => $request->session()->get('checkout'),
            'order'         => $request->session()->get('order'),
            'transaction'   => $request->session()->get('transaction'),
        ];

        // $data = Cache::get('data_resume');
        $order = Order::find(4);

        if($data['checkout']){
            $order = Order::find($data['order']->order_id);
            $transaction = $data['transaction'];
            return view('checkout.resume', ([
                'order' => $order,
                'transaction' => $transaction
            ]));
        }else{
            return redirect()->route('my-account');
        }
    }

}
