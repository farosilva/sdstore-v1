<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;

use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        return view('account.address.address');
    }

    public function create()
    {
        return view('account.address.create');
    }

    public function store(AddressRequest $request)
    {
        if($this->validateAddress($request)){
            return back()->with('address_error', 'Endereço já cadastrado')->withInput();
        }

        $aux = $this->storeDB($request);

        if($request->checkout){
            return redirect()->route('checkout', ['section' => 'address']);
        }

        return redirect()->route('my-account.address')->with('success', 'Cadastrado com sucesso!');

    }

    public function storeDB($request)
    {
        return Address::create([
            'user_id'       => auth()->user()->user_id,
            'address_id'    => $this->getLastId() + 1,
            'address_name'  => ($request->address_name) ?? 'Meu Endereço',
            'street_name'   => $request->street_name,
            'number'        => $request->number,
            'complem'       => $request->complem,
            'district'      => $request->district,
            'city'          => $request->city,
            'state'         => $request->state,
            'city_code'     => $request->city_code,
            'post_code'     => $request->post_code,
        ]);
    }

    private function validateAddress($request)
    {
        return Address::where([
            ['user_id', auth()->user()->user_id],
            ['street_name', $request->street_name],
            ['number', $request->number],
            ['complem', $request->complem],
            ['district', $request->district],
            ['city', $request->city],
            ['state', $request->state],
            ['city_code', $request->city_code],
            ['post_code', $request->post_code],
        ])->exists();
    }

    public function edit($id)
    {
        $address = auth()->user()->addresses->where('address_id', $id)->first();
        return view('account.address.edit', ['address' => $address, 'update' => true]);
    }

    public function update(AddressRequest $request)
    {
        if($this->validateAddress($request)){
            return back()->with('address_error', 'Endereço já cadastrado')->withInput();
        }

        Address::where('user_id', auth()->user()->user_id)
            ->where('address_id', $request->address_id)
            ->update([
                'address_name'  => ($request->address_name) ?? 'Meu Endereço',
                'street_name'   => $request->street_name,
                'number'        => $request->number,
                'complem'       => $request->complem,
                'district'      => $request->district,
                'city'          => $request->city,
                'state'         => $request->state,
                'city_code'     => $request->city_code,
                'post_code'     => $request->post_code,
            ]);

        return redirect()->route('my-account.address')->with('success', 'Alterado com sucesso!');
    }

    public function destroy($id)
    {
        $address = Address::where([
            ['user_id', auth()->user()->user_id],
            ['address_id', $id]
        ])->delete();

        return redirect()->route('my-account.address')->with('success', 'Deletado com sucesso!');;
    }

    private function getLastId()
    {
        if(auth()->user()->addresses->count() > 0){
            return auth()->user()->addresses->last()->address_id;
        }else{
            return 0;
        }
    }
}
