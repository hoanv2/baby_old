<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin() {
        return view('admin.login');
    }
    public function postLogin(Request $request) {

            $email = $request->email;
            $password = $request->password;

            if( Auth::attempt(['email' => $email, 'password' =>$password,'role' => 1]) ) {
                return redirect()->route('users.index');
            }

            if( Auth::attempt(['email' => $email, 'password' =>$password,'role' => 2]) ) {
                return view('client.index');
            }
        }
    }

