<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    public function index()
    {
        return request()->session()->all();
    }

    public function acceptCookies()
    {
        request()->session()->put('app.cookies', [
            'accept'    => true,
            'date'      => date('Y-m-d H:i:s')
        ] );
    }

    // For Components
    public function welcomeModalSetDontShowAgain()
    {
        request()->session()->put('app.components.welcome_modal.dont_show', true);
    }

    public function welcomeModalGetDontShowAgain()
    {
        return request()->session()->get('app.components.welcome_modal.dont_show');
    }

    public function welcomeModalSetPostCode(Request $request)
    {
        request()->session()->put('app.components.welcome_modal.post_code', $request->post_code);
    }

    public function welcomeModalGetPostCode(Request $request)
    {
        return (request()->session()->get('app.components.welcome_modal.post_code')) ?? false;
    }

    // For Cart
    public function sumProductsCart()
    {
        $session = Session::get()->pluck('products');
        $keys = $session->collapse()->keys();

        for ($i=0; $i < $keys->count(); $i++) {
            $products[$keys[$i]] = $session->sum($keys[$i]);
        }

        return ($products) ?? null;
    }

    public function sumProductCart($sku)
    {
        $session = Session::get()->pluck('products');
        $product[$sku] = $session->sum($sku);

        return ($product[$sku]) ?? 0;
    }
}
