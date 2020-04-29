<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Address;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified')->except('showPages');
    }

    public function showPages()
    {
        if(auth()->check()){
            return $this->showIndex();
        }else{
            return view('auth.login-register');
        }
    }

    public function showIndex()
    {
        if (auth()->user()->verified) {
            return view('account.index');
        }else{
            return redirect()->route('verification.notice');
        }
    }

    public function showProfile()
    {
        $contacts = Contact::where([
            ['user_id', auth()->user()->user_id]
        ])->get();

        return view('account.profile.profile', ['contacts' => $contacts]);
    }

    public function showAddress()
    {
        $address = Address::where([
            ['user_id', auth()->user()->user_id]
        ])->get();

        if(auth()->user()->addresses->count() == 0){
            return redirect()->route('my-account.address.create');
        }

        return view('account.address.address', ['address' => $address]);
    }












    // public function index()
    // {
    //     return view('account.index');
    // }

}
