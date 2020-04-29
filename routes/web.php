<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

//Visões
Route::view('/', 'home')->name('home');
Route::view('/institucional', 'institutional')->name('institutional');
Route::view('/contatos', 'contacts')->name('contacts');
Route::get('/cadastro', 'Auth\RegisterController@showForm')->name('register')->middleware('guest');

//Sessões
Route::group(['prefix' => 'session'], function () {
    Route::any('/', 'SessionController@index');
    Route::any('/server', function(){
        $server = $_SERVER;//request()->serve()->all();
        return dd($server);
    });

    Route::any('/accept-cookies', 'SessionController@acceptCookies');

    Route::group(['prefix' => 'components'], function () {
        Route::any('/welcome-modal/set-dont-show-again', 'SessionController@welcomeModalSetDontShowAgain');
        Route::any('/welcome-modal/get-dont-show-again', 'SessionController@welcomeModalGetDontShowAgain');
        Route::any('/welcome-modal/set-post-code', 'SessionController@welcomeModalSetPostCode');
        Route::any('/welcome-modal/get-post-code', 'SessionController@welcomeModalGetPostCode');
    });
});

//Autenticações
Auth::routes(['verify' => true]);
Route::get('login-adm', 'Auth\LoginController@showLoginAdmin')->name('admin');
Route::post('login-adm', 'Auth\LoginController@loginAdmin')->name('login-admin');
Route::post('logout-adm', 'Auth\LoginController@logoutAdmin')->name('logout-admin');

//Search
Route::group(['prefix' => 'busca'], function () {
    Route::get('/', 'SearchController@searchByName')->name('search');
});

//Minha Conta
Route::group(['prefix' => 'minha-conta'], function () {
    Route::get('/', 'AccountController@showPages')->name('my-account');

    /*Dados Pessoais*/
    Route::get('/meus-dados', 'AccountController@showProfile')->name('my-account.profile');

    /*Contatos*/
    Route::group(['prefix' => 'meus-contatos'], function () {
        Route::get('/', 'ContactController@index')->name('my-account.contacts');
        Route::get('/novo', 'ContactController@create')->name('my-account.contacts.create');
        Route::get('/alterar/{id}', 'ContactController@edit')->name('my-account.contacts.edit');
    });

    /*Enderecos*/
    Route::group(['prefix' => 'meus-enderecos'], function () {
        Route::get('/', 'AddressController@index')->name('my-account.address');
        Route::get('/novo', 'AddressController@create')->name('my-account.address.create');
        Route::get('/alterar/{id}', 'AddressController@edit')->name('my-account.address.edit');
    });

    /*Pedidos*/
    Route::group(['prefix' => 'meus-pedidos'], function () {
        Route::get('/', 'OrderController@index')->name('my-account.orders');
        Route::get('/{order}', 'OrderController@show')->name('my-account.orders.order');
    });
});

//Produtos
Route::group(['prefix' => 'produtos'], function () {
    Route::get('/', 'ProductController@index')->name('products');
    Route::get('/{product}', 'ProductController@showProduct')->name('product');
});

//Carrinho
Route::group(['prefix' => 'carrinho'], function () {
    Route::any('/', 'CartController@index')->name('cart');
    Route::any('/expirado', 'CartController@expirate')->name('cart.expirate');
});

//Checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::any('/', 'CheckoutController@index')->name('checkout');

    //Contact
    Route::post('/contacts/store', 'CheckoutController@contactsStore')->name('checkout.contacts.store');

    //Address
    Route::post('/address/store', 'CheckoutController@addressStore')->name('checkout.address.store');
    Route::post('/address/select', 'CheckoutController@addressSelect')->name('checkout.address.select');

    //Payment
    Route::post('/fechar-pedido/boleto', 'CheckoutController@checkoutBoleto');

    Route::any('/finalizado', 'CheckoutController@checkoutOrder')->name('checkout.order');
});

Route::group(['prefix' => 'notifications'], function () {
    Route::any('/pagseguro', 'NotificationController@pagSeguro');
    Route::any('/view', 'NotificationController@seePagSeguro');
    Route::any('/client-message', 'NotificationController@clientMessage')->name('notification.from-client');
});

//CRUDS
Route::group(['prefix' => 'database'], function () {
    Route::group(['prefix' => 'address'], function () {
        Route::post('/store', 'AddressController@store')->name('register.address.store');
        Route::put('/update', 'AddressController@update')->name('register.address.update');
        Route::delete('/destroy/{id}', 'AddressController@destroy')->name('register.address.destroy');
    });

    Route::group(['prefix' => 'contacts'], function () {
        Route::post('/store', 'ContactController@store')->name('register.contact.store');
        Route::put('/update', 'ContactController@update')->name('register.contact.update');
        Route::delete('/destroy/{id}', 'ContactController@destroy')->name('register.contact.destroy');
    });

    Route::group(['prefix' => 'subscriber'], function () {
        Route::post('store', 'SubscriberController@subscribe')->name('subscriber.store');
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::any('/', 'CartController@cart');
        Route::any('/add', 'CartController@addItem')->name('cart.add');
        Route::any('/update', 'CartController@updateItem')->name('cart.update');
        Route::any('/delete', 'CartController@deleteItem')->name('cart.delete');
        Route::any('/products', 'CartController@products');
        Route::any('/expiration-time', 'CartController@expirationTime')->name('cart.expiration-time');
    });

    Route::group(['prefix' => 'checkout'], function () {

    });
});

// ADMIN
Route::group(['prefix' => 'admin'], function () {
    Route::get('orders/avaiables', 'OrderController@avaiables')->name('admin.orders-avaiables');
    Route::get('orders/pendings', 'OrderController@pendings')->name('admin.orders-pendings');
    Route::post('orders/delivery', 'OrderController@delivering')->name('admin.orders-delivery');

    Route::get('orders/{order}', 'OrderController@showOrder')->name('admin.orders-show');
});

Route::get('/flush', function(){
    request()->session()->flush();
});

// Route::get('/artisan', function(){
//     // return Artisan::command('migrate', array('--path' => 'app/migrations'));
//     // return Artisan::call('migrate', array('--path' => 'app/migrations', '--force' => true));
//     // return Artisan::call('migrate --force');

//     return Artisan::callSilent('migrate', [
//         '--force' => true,
//         // '--seed' => true
//     ]);
// });

Route::any('/teste', 'TesteController@teste');

Route::any('mailable', function () {
    $info = (\App\Models\Order::find(57))->payment->infos->last();

    return new App\Mail\StatusPaymentMail($info);
});
