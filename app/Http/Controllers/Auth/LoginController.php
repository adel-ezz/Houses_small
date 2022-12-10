<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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


    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect(app('admin'));
        }
        return view('admin.login');
    }

    protected function validateLogin(Request $request)
    {

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function login(Request $request)
    {


        $this->validateLogin($request);

        $email = $request->get($this->username());
        $remember = $request->remember == 'on' ? 1 : 0;

        $usingEmail = Auth::attempt(['email' => $email, 'password' => $request->password], $remember);
        if ($usingEmail) {
            $user = Auth::user();
            return redirect()->to(app('admin'));
        }

        return $this->sendFailedLoginResponse($request);
    }


    public function logout(Request $request)
    {

        if (Auth::check()) {
            Auth::logout();
            return redirect('/');
        }

    }

}
