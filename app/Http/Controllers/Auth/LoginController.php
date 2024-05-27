<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected function authenticated(Request $request, $user)
    {
        if (!$user->activo == 1) {
            auth()->logout();
            return redirect('/login')->with('error', 'Tu usario se encuentra inactivo, Por favor comunicate con el administrador.');
        }

        return redirect('/home');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
