<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\DeliveryCity;
use App\Models\DeliveryRemember;

class DeliveryController extends Controller
{
    public function getCityByCode(Request $request)
    {
        return DeliveryCity::findOrFail($request->ibge_id);
    }

    // public function setOnSession(Request $request)
    // {
    //     request()->session()->put('delivery.post_code', $request->post_code);
    // }

    // public function getOnSession(Request $request)
    // {
    //     return (request()->session()->get('delivery.post_code')) ?? false;
    // }

    public function setRemember(Request $request)
    {
        $request->validate(
            [
                'email'         => 'required|email',
                'post_code'     => 'required|size:8',
                'city_code'     => 'required|size:7'
            ],
            [
                'required'      => 'Campo obrigatório',
                'email'         => 'Deve ser um e-mail válido'
            ]
        );


        try {
            $aux = DeliveryRemember::create([
                'email'             => $request->email,
                'post_code'         => $request->post_code,
                'city_code'         => $request->city_code
            ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Cadastrado com Sucesso'
            ], 200);
        } catch (QueryException $qe) {
            switch ($qe->getCode()) {
                case 23000:
                    return response()->json([
                        'success'   => false,
                        'code'      => $qe->getCode(),
                        'message'   => 'E-mail já cadastrado'
                    ], 500);
                break;

                default:
                    return response()->json([
                        'success'   => false,
                        'code'      => $qe->getCode(),
                        'message'   => 'Falha ao cadastrar e-mail'
                    ], 500);
                    break;
            }
        }
    }
}
