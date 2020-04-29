<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Database\QueryException;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('account.contacts.contacts');
    }

    public function create()
    {
        return view('account.contacts.create');
    }

    public function store(ContactRequest $request)
    {
        $this->storeDB($request);

        if($request->checkout){
            return redirect()->route('my-account');
        }

        return redirect()->route('my-account.contacts')->with('success', 'Cadastrado com sucesso!');
    }

    public function storeDB($request)
    {
        return Contact::create([
            'user_id'       => auth()->user()->user_id,
            'contact_id'    => Contact::where('user_id', auth()->user()->user_id)->count() + 1,
            'contact_name'  => $request->contact_name,
            'phone_1'       => $request->phone_1,
            'phone_2'       => (is_null($request->phone_2)) ? $request->phone_2 : 0,
            'whatsapp'      => (is_null($request->whatsapp)) ? $request->whatsapp : 0,
            'email'         => $request->email,
        ]);
    }

    public function edit($id)
    {
        $contact = auth()->user()->contacts->where('contact_id', $id)->first();
        return view('account.contacts.edit', ['contact' => $contact, 'update' => true]);
    }

    public function update(ContactRequest $request)
    {
        $contact = Contact::where([
            ['user_id', auth()->user()->user_id],
            ['contact_id', $request->contact_id]
        ])->first();

        $contact->contact_name = $request->contact_name;
        $contact->phone_1 = $request->phone_1;
        $contact->phone_2 = ($request->phone_2) ? $request->phone_2 : 0;
        $contact->whatsapp = ($request->whatsapp) ? $request->whatsapp : 0;
        $contact->email = $request->email;
        $contact->save();

        return redirect()->route('my-account.contacts')->with('success', 'Alterado com sucesso!');
    }

    public function destroy($id)
    {
        $contact = Contact::where([
            ['user_id', auth()->user()->user_id],
            ['contact_id', $id]
        ])->delete();

        return redirect()->route('my-account.contacts')->with('success', 'Deletado com sucesso!');
    }

}
