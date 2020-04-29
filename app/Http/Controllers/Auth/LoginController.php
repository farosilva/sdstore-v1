<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

use Gloudemans\Shoppingcart\Facades\Cart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function showLoginForm()
    // {
        // return redirect()->route('my-account');
    // }

    public function login(LoginRequest $request)
    {
        $credentials = $this->getUsername($request);
        return $this->authenticating($request->merge($credentials));
    }

    public function showLoginAdmin()
    {
        if(auth('admin')->check()){
            return redirect()->route('admin.orders-avaiables');
        }
        return view('auth.login-admin');
    }

    public function loginAdmin(LoginRequest $request)
    {
        if(auth('admin')->check()){
            return redirect()->route('admin.orders-avaiables');
        }
        $credentials = $this->getUsername($request);
        return $this->authenticating($request->merge($credentials), 'admin');
    }

    private function getUsername($request)
    {
        if($request->has('username')){
            if(is_numeric($request['username'])){
                return [
                    'cpf_cnpj'  => $request['username'],
                    'password'  => $request['password_login']
                ];
            }else{
                return [
                    'email'     => $request['username'],
                    'password'  => $request['password_login']
                ];
            }
        }else{
            abort(500);
        }
    }

    private function authenticating(LoginRequest $request, $guard = 'web')
    {
        $credentials = $request->only(['cpf_cnpj','email','password']);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if($this->guard($guard)->attempt($credentials)){
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }

    protected function authenticated(Request $request, $user)
    {
        if(Cart::count() > 0){
            return redirect()->route('cart');
        }
        if(auth('admin')->check()){
            return redirect()->route('admin.orders-avaiables');
        }
        return redirect()->route('my-account');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function username()
    {
        return 'email_login';
    }

    public function logout(Request $request, $guard = 'web')
    {
        $this->guard($guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }

    public function logoutAdmin()
    {
        $this->guard('admin')->logout();
        return redirect()->route('login-admin');
    }

    protected function loggedOut(Request $request)
    {
        //
    }

    protected function guard($guard = 'web')
    {
        return Auth::guard($guard);
    }

}
