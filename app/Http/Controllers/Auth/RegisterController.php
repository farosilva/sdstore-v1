<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\RegisterRequest;

use Illuminate\Auth\Events\Registered;
use App\Models\Address;
use App\Models\Contact;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';//RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('showForm');
    }

    public function showForm()
    {
        if(auth()->check()){
            return ($this->showFormSteps());
        }else{
            return view('auth.register', ['store' => true]);
        }
    }

    protected function showFormSteps()
    {
        if(count(auth()->user()->addresses) == 0){
            return view('auth.register', ['address' => true]);
        }

        if(count(auth()->user()->contacts) == 0){
            return view('auth.register', ['contact' => true]);
        }

        return redirect()->route('my-account');
    }

    public function register(RegisterRequest $request)
    {
        event(new Registered(
            $user = User::create([
                'full_name'         => $request->full_name,
                'short_name'        => $request->short_name,
                'type'              => 'F',
                'email'             => $request->email,
                'cpf_cnpj'          => $request->cpf_cnpj,
                'password'          => Hash::make($request->password),
            ])
        ));

        $user->infos_natural()->create([
            'birth_date'            => date('Y-m-d', strtotime(str_replace('/','-',$request->birth_date))),
            'genre'                 => $request->genre
        ]);

        $this->guard()->login($user);

        return $this->registered();

    }

    protected function registered()
    {
        return redirect()->route('my-account');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
