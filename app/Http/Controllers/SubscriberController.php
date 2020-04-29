<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function create($data)
    {
        return Subscriber::create([
            'name'      => $data['name'],
            'email'     => ($data['email']) ?? null,
            'whatsapp'  => (preg_replace('/[^0-9]/','',$data['whatsapp'])) ?? null,
            'user_id'   => ($data['user_id']) ?? null,
        ]);
    }

    public function subscribe(Request $request)
    {
        $input = $request->validate(
            [
                'name'                  => 'required',
                'email'                 => 'required_without:whatsapp',
                'whatsapp'              => 'required_without:email',
            ],
            [
                'required'              => 'Campo obrigatório',
                'required_without'      => 'Campo obrigatório',
            ],
        );
        $this->create($input);

        return back()->with('success_subscribe', 'Inscrição realizada com sucesso');
    }

    public function unsubscribed()
    {
        return '???';
    }
}
